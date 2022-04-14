<?php

namespace App\Console\Commands;

use App\Library\CustomCatApi;
use App\Library\EbayApi;
use App\Library\GearmentApi;
use App\Models\Account;
use App\Models\LineItem;
use App\Models\Order;
use App\Models\OrderSupplier;
use App\Models\SupplierLineItem;
use Composer\XdebugHandler\Status;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Share;
use Symfony\Component\ErrorHandler\Debug;

class SyncOrderSupplier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sync-order-supplier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * gearment
     * success 1474629
     * fail  1474220
     * customcat
     * key : 238B09B1-A99F-DE3C-A2BED79F0032390C
     * success ef65f8ce-b018-40fe-827a-d4edbed34e52
     * @return mixed
     *
     */
    public function handle()
    {
        Log::debug('Begin sync');
        $ebay = new EbayApi();
        $supplierOrders = OrderSupplier::where([
                                        ['status', '!=', 'Canceled'],
                                        ['tracking_number', null]
                                    ])->get();
        $gearment = new GearmentApi();
        $customcatAPI = new CustomCatApi();
        foreach($supplierOrders as $supplierOrder)
        {
            $orderDetail = Order::where('id', '=' , $supplierOrder->order_id)->first();
            $account = Account::where('id', $orderDetail->account_id)->firstOrFail();
            $accessToken = Share::getAccessToken($account);
            try
            {
                $tracking_ebay = $ebay->getShippingFulfillments($accessToken, $orderDetail->ebay_order_id);
            }
            catch (\Exception $e)
            {
                $supplierOrder->update([
                    'status' => 'Error'
                ]);
                Log::error($e);
                continue;
            }
            if ($tracking_ebay->total > 0)
            {
                $fulfillments = $tracking_ebay->fulfillments;
                $allTrackingNumber = '';

                foreach($fulfillments as $fulfillment)
                {
                    if ($allTrackingNumber == '')
                    {
                        $allTrackingNumber = $fulfillment->shipmentTrackingNumber;
                    }
                    else
                    {
                        $allTrackingNumber = $allTrackingNumber.','.$fulfillment->shipmentTrackingNumber;
                    }
                    $ebayLineItems = $fulfillment->lineItems;
                    foreach($ebayLineItems as $ebayLineItem)
                    {
                        $lineItem = LineItem::where('ebay_line_item_id', $ebayLineItem->lineItemId)->first();
                        $supplierLineItem = SupplierLineItem::where('line_item_id','=' ,$lineItem->id)->first();
                        $supplierLineItem->update([
                            'tracking_number' => $fulfillment->shipmentTrackingNumber,
                            'tracking_status' => 'Shipped',
                        ]);
                    }
                }

                $supplierOrder->update([
                    'status' => 'Shipped',
                    'tracking_number' => $allTrackingNumber
                ]);

            }
            else if ($supplierOrder->supplier_name == 'gearment')
            {
                $response = $gearment->orderInfo($supplierOrder->order_id_supplier);

                $supplierLineItems = SupplierLineItem::where('order_supplier_id','=' ,$supplierOrder->id)->get();
                Log::debug("Gearment id:".$supplierOrder->order_id_supplier);
                if ($response->status = "success")
                {
                    $result = $response->result;
                    if ($result->tracking_number!='')
                    {
                        foreach($supplierLineItems as $supplierLineItem)
                        {
                            $supplierLineItem->update([
                                'tracking_number' => $result->tracking_number,
                                'tracking_company' => $result->tracking_company,
                                'tracking_url' => $result->link_tracking,
                                'tracking_status' => 'Shipped'
                            ]);

                        };
                        $resultEbay = $ebay->CompleteSale($accessToken, $orderDetail->ebay_order_id , $result->tracking_number, $result->tracking_company);
                        if ($resultEbay)
                        {
                            $supplierOrder->update([
                                'status' => 'Shipped',
                                'status_ebay' => 0, // normal
                                'tracking_number' => $result->tracking_number
                            ]);
                        }
                        else {
                            $supplierOrder->update([
                                'status_ebay' => 2,
                                'status' => 'Tracking Error'
                            ]);
                        }
                    }

                }
                else
                {
                    Log::debug($supplierOrder->order_id." fail \n");
                    echo($supplierOrder->order_id." fail \n");
                }
            }
            else if ($supplierOrder->supplier_name == 'customcat')
            {
                if ($orderDetail)
                {
                    $result = $customcatAPI->getOrderStatus($orderDetail->ebay_order_id);
                    Log::debug("Customcat id:".$orderDetail->ebay_order_id);
                    $supplierLineItems = SupplierLineItem::where('order_supplier_id','=' ,$supplierOrder->id)->get();
                    if (isset($result->ORDER_STATUS))
                    {
                        Log::debug($result->ORDER_STATUS);
                        $supplierOrder->update([
                            'status' => $result->ORDER_STATUS
                        ]);
                        if ($result->ORDER_STATUS == 'Shipped')
                        {
                            $shipments = $result->SHIPMENTS;
                            $lineItems = $result->LINE_ITEMS;
                            //maybe wrong: wating json to check
                            $i = 0;
                            $allTrackingNumber = '';
                            foreach($supplierLineItems as $supplierLineItem)
                            {
                                if ($i == 0)
                                {
                                    $allTrackingNumber = $shipments[$i]->TRACKING_ID;
                                }
                                else
                                {
                                    $allTrackingNumber = $allTrackingNumber.','.$shipments[$i]->TRACKING_ID;
                                }
                                $supplierLineItem->update([
                                    'tracking_number' => $shipments[$i]->TRACKING_ID,
                                    'tracking_company' => $shipments[$i]->VENDOR,
                                    'tracking_status' => $lineItems[$i]->STATUS,
                                ]);
                                $i++;
                            }
                            $resultEbay = $ebay->CompleteSale($accessToken, $orderDetail->ebay_order_id , $result->tracking_number, $result->tracking_company);
                            if ($resultEbay)
                            {
                                $supplierOrder->update([
                                    'status' => 'Shipped',
                                    'status_ebay' => 0, // normal
                                    'tracking_number' => $allTrackingNumber
                                ]);
                            }
                            else {
                                $supplierOrder->update([
                                    'status_ebay' => 2, // normal
                                    'status' => 'Tracking Error'
                                ]);
                            }
                        }
                        else
                        {
                            foreach($supplierLineItems as $supplierLineItem)
                            {
                                $supplierLineItem->update([
                                    'tracking_status' => $result->ORDER_STATUS,
                                ]);
                            }
                        }
                    }
                }

            }
        }

        Log::debug('Begin sync order');
        $orders = Order::leftJoin('order_suppliers','orders.id' ,'=', 'order_suppliers.order_id')
                        ->where([
                            ['orders.status', '!=', 'Cancelled'],
                            ['orders.status', '!=', 'Pending'],
                            ['order_suppliers.tracking_number', null],
                        ])->select('orders.*')->get();
        foreach($orders as $order)
        {
            $account = Account::where('id', $order->account_id)->firstOrFail();
            if (!is_null($account))
            {
                $accessToken = Share::getAccessToken($account);
                try
                {
                    $orderEbay = $ebay->getOrderXml($accessToken, $order->ebay_order_id);
                    $order->update([
                        'status' => (string)$orderEbay->OrderArray->Order->OrderStatus,
                    ]);
                } catch (Exception $e)
                {
                    Log::error($order->ebay_order_id);
                    Log::error($e);
                }
            }
        }
    }
}
