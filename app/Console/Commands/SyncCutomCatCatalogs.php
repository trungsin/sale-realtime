<?php

namespace App\Console\Commands;

use App\Library\CustomCatApi;
use App\Models\CustomcatCatalog;
use App\Models\CustomcatCatalogSku;
use Illuminate\Console\Command;

class SyncCutomCatCatalogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:sync-customcat-catalogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync customcat catalogs';

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
        $customcat = new CustomCatApi();
        echo "Start sync customcat\n";
        foreach(config('customcat') as $key => $items)
        {
            if ($key == 'catalog')
            {
                foreach($items as $item=> $data)
                {
                    $idCatalog = $data["id"];
                    $dataItems = $customcat->getProduct($idCatalog);
                    foreach ($dataItems as $catalogKey => $dataItem)
                    {
                        $catalogItem = CustomcatCatalog::updateOrCreate([
                            'id' => $idCatalog,
                        ],[
                            'name' => $dataItem->product_name,
                            'had_back' => $dataItem->had_back,
                        ]);
                        $colorItems = $dataItem->product_colors;
                        foreach($colorItems as $colorKey => $colorItem)
                        {
                            $skuItems = $colorItem->skus;
                            foreach ($skuItems as $skuKey => $skuItem)
                            {
                                //dd($skuItem);
                                $sku = CustomcatCatalogSku::updateOrCreate([
                                    'id' => $skuItem->catalog_sku_id,
                                ],[
                                    'size' => $skuItem->size,
                                    'color'=> $colorItem->color,
                                    'hex_color' => $colorItem->color_hex,
                                    'cost' => $skuItem->cost,
                                    'mrsp' => $skuItem->mrsp,
                                    'customcat_catalog_id' => $idCatalog
                                ]);
                            }
                        }
                    }
                    //dd($idCatalog);
                }
            }
        }
        echo "Finish sync customcat\n";
    }
}
