<?php
namespace App\Repositories;

use App\Respositories\RespositoryAbstract;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * Class UserRepository
 *
 * @package App\Repositories\Admin
 */
class ProductAttributeRepository extends RespositoryAbstract
{
    public $fixedAttributes = [
        'Material',
        'Style',
        'Neckline',
        'Sleeve Length',
        'Tyle',
        'Color',
        'Department',
        'Fabric Type',
        'Pattem',
        'Occasion',
        'Fit',
        'Vintage'
    ];

    /**
     * Function getModel
     *
     * @return model
     */
    public function getModel()
    {
        return ProductAttribute::class;
    }

    public function insertBulk($params, $productId) {
        $attrs = $this->reFormatAttributes($params, $productId);
        $this->model->where('product_id', $productId)
            ->delete();
        $this->model->insert($attrs);
    }

    private function reFormatAttributes($params, $productId) {
        $attributes = [];
        foreach($params as $key => $attr) {
            if (!empty($attr)) {
                $attributes[] = [
                    'product_id' => $productId,
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'value' => $attr,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }
        return $attributes;
    }

    public function formatAttributeInResponse($product) {
        $attrs = [];
        $attributes = $product->attributes;
        if (!empty($attributes)) {
            foreach($attributes as $attr) {
                $attrs[$attr->name] = $attr->value;
            }
        }
        return $attrs;
    }

    public function createByTemplate($template, $productId)
    {
        $attributes = [];
        // Create product attribute
        $itemSpecifics = $template->itemSpecificTemplates;
        $now = Carbon::now();
        $color = '';
        foreach($itemSpecifics as $item) {
            if ($item->itemSpecific->name_field == 'color' && $color == '') {
                $color = $item->value;
            }
            if (!in_array($item->itemSpecific->name_field, ['size', 'color'])) {
                $row = [
                    'product_id' => $productId,
                    'name' => $item->itemSpecific->name,
                    'value' => $item->value,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
                $attributes[] = $row;
            }
        }
        Log::info('Creating product attribute');
        ProductAttribute::insert($attributes);
        Log::info('Created product attribute');
        return $color;
    }

}
