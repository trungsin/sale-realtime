<?php
namespace App\Repositories;

use App\Library\Share;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Variant;
use App\Models\VariantAttribute;
use App\Models\VariantCombination;
use App\Models\VariantOption;
use App\Respositories\RespositoryAbstract;
use Illuminate\Support\Facades\Log;


/**
 * Class VariantRepository
 *
 * @package App\Repositories
 * @author EnableStartup <hello@enablestartup.com>
 */
class VariantRepository extends RespositoryAbstract
{
    // variable
    protected CONST STRING_DEFAULT = "";

    /**
     * Function getModel
     *
     * @return model
     */
    public function getModel()
    {
        return Variant::class;
    }

    /**
     * Function search get all data with search and pagination
     *
     * @param string $search
     * @param number $productId
     * @return mixed
     */
    public function getData($search, $productId)
    {
        // get data from config file
        $limit = $this->limit;

        if ($search != self::STRING_DEFAULT) {
            $listVariant = $this->model->latest('id')
                ->where('product_id', $productId)
                ->whereLike(
                    ['color.name', 'size.name', 'price', 'cost_price', 'sku']
                , $search)
                ->paginate($limit);

            return $listVariant;
        }

    	return $this->model->where('product_id', $productId)->latest('id')->paginate($limit);
    }

    public function getFirstByProduct($productId)
    {
        return $this->model->where('product_id', $productId)->first();
    }

    public function variantDetail2Array($variants)
    {
        $rs = [];
        foreach($variants as $variant)
        {
            $arr = Share::variant2array($variant->detail);
            foreach($arr as $k => $v) {
                $rs[$k][] = $v;
            }
        }
        return $rs;
    }

    /**
     * Insert list variants
     */
    public function insertBulk($param, $productId, $price)
    {
        // Color:Black,Size (Men's):2XL
        $variantDetails = [];
        $colors = $param['Color'];
        unset($param['Color']);
        /**
         * $param = [
         *  'Color' => ['Black', 'Red'],
         *  'Size (Men\'s)' => ['S', 'M', 'L', 'XL']
         * ]
         */
        foreach($param as $key => $attrs)
        {
            foreach($attrs as $attr)
            {
                foreach($colors  as $color) {
                    $variantDetails[] = "Color:$color,$key:$attr";
                }
            }
        }
        // foreach($param as $key => $attrs)
        // {
        //     $variantAttr = VariantAttribute::firstOrCreate([
        //         'name' => $key
        //     ]);
        //     foreach($attrs as $attr) {
        //         $variantOption = VariantOption::firstOrCreate([
        //             'variant_attribute_id' => $variantAttr->id,
        //             'value' => $attr
        //         ]);
        //         $variantCombination = VariantCombination::firstOrCreate([
        //             'variant_id' => $variantAttr->id,

        //         ]);
        //     }
        // }
    }

    private function reFormatVariants($params, $productId) {
        $product = Product::find($productId);
        $sizes = $params['sizes'];
        $colors = $params['colors'];
        $variants = [];
        foreach ($sizes as $size) {
            foreach ($colors as $color) {
                $objSize = Size::find($size);
                $objColor = Color::find($color);
                $sku = "{$product->sku}-{$objColor->value}-{$objSize->value}";
                $variants[] = [
                    'product_id' => $productId,
                    'color_id' => $color,
                    'size_id' => $size,
                    'quantity' => 1,
                    'sku' => $sku,
                    'price' => $price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        return $variants;
    }

    public function createVariantFromTemplate($product, $template, $color)
    {
        Log::info('Creating product variant');
        $now = Carbon::now();
        $templateVariant = $template->templateVariant;
        $optionVariants = $templateVariant->optionVariants;
        $colors = [];
        $variantData = [];

        if (!empty($color)) {
            $colors = explode(',', $color);
        }

        foreach ($optionVariants as $option) {
            $objSize = Size::firstOrCreate([
                'name' => $templateVariant->name,
                'value' => $option->name
            ]);
            foreach ($colors as $color) {
                $objColor = Color::firstOrCreate(['name' => $colors]);
                $sku = "{$product->sku}-{$objColor->value}-{$objSize->value}";
                $variantData[] = [
                    'product_id' => $product->id,
                    'color_id' => $objColor->id,
                    'size_id' => $objSize->id,
                    'price' => $option->price,
                    'sku' => $sku,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        $this->model->insert($variantData);
        Log::info('Created product variant');
    }

}
