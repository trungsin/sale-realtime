<?php
namespace App\Repositories;

use App\Respositories\RespositoryAbstract;
use App\Models\ProductAccount;

/**
 * Class UserRepository
 *
 * @package App\Repositories\Admin
 */
class ProductAccountRepository extends RespositoryAbstract
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
        return ProductAccount::class;
    }

    public function createByTemplate($template, $productId)
    {
        return $this->model->create([
            'product_id' => $productId,
            'account_id' => $template->account_id,
            'country_iso' => $template->location_country,
            'return_policy_id' => $template->return_policy_id,
            'payment_policy_id' => $template->payment_policy_id,
            'fulfillment_policy_id' => $template->fulfillment_policy_id,
            'postcode' => $template->location_zip_code,
            'location' => $template->location_state
        ]);
    }

}
