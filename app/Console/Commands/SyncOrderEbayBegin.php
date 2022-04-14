<?php

namespace App\Console\Commands;

use App\Jobs\SyncTrackingToEbay;
use App\Library\CustomCatApi;
use App\Library\EbayApi;
use App\Library\GearmentApi;
use App\Models\Account;
use App\Models\Order;
use App\Models\OrderSupplier;
use App\Models\SupplierLineItem;
use Illuminate\Console\Command;
use Share;

class SyncOrderEbayBegin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sync-from-ebay-begin {supplier} {status}';

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
     * @return mixed
     */
    public function handle()
    {
        echo "Begin sync \n";
        $ebay = new EbayApi();
        $gearment = new GearmentApi();
        $customcatAPI = new CustomCatApi();
        $supplierOrders = OrderSupplier::where('status',$this->argument('status'))
                                        ->where('supplier_name',$this->argument('supplier'))
                                        ->get();
        foreach($supplierOrders as $supplierOrder)
        {
            if ($supplierOrder->supplier_name == 'gearment')
            {
                $response = $gearment->orderInfo($supplierOrder->order_id_supplier);

                if ($response->status = "success")
                {
                    $result = $response->result;
                    $supplier_line_items = $supplierOrder->SupplierLineItem;
                    if ($result->tracking_number!='')
                    {
                        foreach($supplier_line_items as $key => $item)
                        {
                            $item->update([
                                'tracking_number' => $result->tracking_number,
                                'tracking_url' => $result->link_tracking,
                                'tracking_company' => $result->tracking_company,
                                'tracking_status' => 'Shipped'
                            ]);
                        }
                        SyncTrackingToEbay::dispatch('gearment', $result->order_number, $result->tracking_number, $result->tracking_company);
                        echo($supplierOrder->order_id." success \n");
                    }
                    else
                    {
                        echo('Missing tracking number');
                    }

                }
                else
                    echo($supplierOrder->order_id." fail \n");
            }
            else if ($supplierOrder->supplier_name == 'customcat')
            {
                $order = Order::where('id', $supplierOrder->order_id)->first();
                if ($order)
                {
                    $result = $customcatAPI->getOrderStatus($order->ebay_order_id);
                    $account = Account::where('id', $order->account_id)->firstOrFail();
                    $accessToken = Share::getAccessToken($account);
                    echo("Customcat id:".$order->ebay_order_id);
                    echo "\n";
                    if (isset($result->ORDER_STATUS))
                    {
                        $supplier_line_items = $supplierOrder->SupplierLineItem;
                        $shipments = $result->SHIPMENTS;
                        if (count($shipments) > 0)
                        {
                            foreach($supplier_line_items as $supplierLineItem)
                            {
                                $supplierLineItem->update([
                                    'tracking_number' => $shipments[0]->TRACKING_ID,
                                    'tracking_company' => $shipments[0]->VENDOR,
                                    'tracking_status' => 'Shipped'
                                ]);
                            }
                            $resultEbay = $ebay->CompleteSale($accessToken, $order->ebay_order_id , $shipments[0]->TRACKING_ID, $shipments[0]->VENDOR);
                            if ($resultEbay)
                            {
                                $supplierOrder->update([
                                    'status' => 'Shipped',
                                    'status_ebay' => 0,
                                    'tracking_number' => $shipments[0]->TRACKING_ID
                                ]);
                            }
                            else {
                                $supplierOrder->update([
                                    'status_ebay' => 2,
                                    'status' => 'Tracking Error'
                                ]);
                            }
                        }
                        else {
                            echo "Missing tracking \n";
                        }
                    }
                    else
                    {
                        echo "Missing order status \n";
                    }
                }

            }
        }
        echo ("end sync");
    }
}
