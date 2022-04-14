<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\AccountController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Library\Ebay\Trading\Trading;
use App\Models\Account;
use App\Models\ItemSpecific;
class GetItemSpecifics extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'data:get-item-specifics';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'get-item-specifics';

  /**
   * Create a new command instance.
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
    $acc = Account::where('id',3)->first();
    $trading = new Trading();
    $categories = [15687];
    foreach ($categories as $key => $category) {
      $item_specifics = $trading->getCategorySpecifics($category,$acc);
      foreach ($item_specifics as $key => $item) {
        ItemSpecific::firstOrCreate([
                                      'name' => $item->Name,
                                      'type' => $item->ValidationRules->ValueType,
                                      'name_field' => strtolower(str_replace(" ","_",$item->Name)),
                                      'max_value' => $item->ValidationRules->MaxValues,
                                      'usage_constraint' => $item->ValidationRules->UsageConstraint,
                                      'category_id' => $category
                                    ]);
        echo "create item_specific $item->Name \n";
      }
    }
    echo "Finish \n";
  }
}
