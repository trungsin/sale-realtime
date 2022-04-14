<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\GearmentController;
use App\Library\GearmentApi;
use App\Models\GearmentCategory;
use App\Models\GearmentVariant;
use Illuminate\Console\Command;

class SyncGearmentCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:sync-gearment-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync gearment categories';

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
        echo "Sync start\n";
        $gearment = new GearmentApi();
        $categories = $gearment->productCategories();
        foreach($categories->result as $category)
        {
            $item = GearmentCategory::updateOrCreate([
                'id' => $category->product_id,
            ], [
                'name' => $category->product_name,
                'mock' => $category->product_img,
            ]);
            if (count($category->variants) != $item->variant->count()) {
                foreach ($category->variants as $variant) {
                    GearmentVariant::updateOrCreate([
                            'id' => $variant->variant_id,
                    ],[
                        'name' => $variant->name,
                        'size' => $variant->size,
                        'color' => $variant->color,
                        'hex_color_code' => $variant->hex_color_code,
                        'price' => $variant->price,
                        'gearment_category_id' => $item->id
                    ]);
                }
            }
        }

        echo "Sync finish\n";
    }
}
