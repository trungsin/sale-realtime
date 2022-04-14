<?php

namespace App\Repositories;

use App\Library\Ebay\MerchantData\Types\InternationalShippingServiceOptionsType;
use App\Library\Ebay\MerchantData\Types\ShippingServiceOptionsType;
use App\Library\Ebay\Trading\Enums;
use App\Library\Ebay\Trading\Types;
use App\Library\Share;
use App\Models\Color;
use App\Models\ListingTemplate;
use App\Models\Product;
use App\Respositories\RespositoryAbstract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class ProductRepository.
 */
class ProductRepository extends RespositoryAbstract
{
    // variable
    protected const STRING_DEFAULT = '';

    /**
     * Function getModel.
     *
     * @return model
     */
    public function getModel()
    {
        return Product::class;
    }

    /**
     * Function search get all data with search and pagination.
     *
     * @param number $productId
     *
     * @return bool
     */
    public function hasProduct($productId)
    {
        $result = $this->model->where('id', $productId)->exists();

        return $result ? true : false;
    }

    /**
     * Function get Product.
     *
     * @param number $productId
     *
     * @return mixed
     */
    public function getProduct($productId)
    {
        return $this->model->where('id', $productId)->first();
    }

    public function syncProductToEbay($productAccount, $product)
    {
        try {
            $item = $this->buildItem($product, $productAccount);

            if ($productAccount && $productAccount->ebay_product_id > 0) {
                Log::info('Existing product on ebay ' . $product->name);
                Log::channel('syncproducttoebaylog')->info('Existing product on ebay ' . $product->name);
            // $trading->addItem($item, $account);
            } else {
                $account = $productAccount->account;
                $trading = new \App\Library\Ebay\Trading\Trading();
                $verify = $trading->verifyItem($item, $account);

                if ($verify['verified']) {
                    $rs = $trading->addItem($item, $account);
                    if ($rs['success']) {
                        $productAccount->ebay_product_id = $rs['ItemID'];
                        $productAccount->status = 'complete';
                    } else {
                        $productAccount->status = 'error';
                        $productAccount->message = $rs['message'];
                    }
                    $productAccount->save();
                    Log::channel('syncproducttoebaylog')->info('Complete product sync ' . $product->name);
                } else {
                    $productAccount->status = 'error';
                    $productAccount->message = $verify['message'];
                    $productAccount->save();
                    Log::channel('syncproducttoebaylog')->error('Verified failed ' . $product->name);
                }
            }
        } catch (\Exception $ex) {
            Log::channel('syncproducttoebaylog')->error('Error build item ' . $ex->getMessage());
        }
    }

    public function addBrandToEbay(&$item, $product)
    {
        if ($product->brand) {
            $specific = new Types\NameValueListType();
            $specific->Name = 'Brand';
            $specific->Value[] = $product->brand->name;
            $item->ItemSpecifics->setNameValueList($specific);
        }
    }

    public function addVariantToEbay(&$item, $product)
    {
        if ($product->variants()->count()) {
            foreach ($product->variants as $variant) {
                $variation = new Types\VariationType();
                // $variation->SKU = $variant->sku;
                $variation->Quantity = $variant->quantity;
                $variation->StartPrice = (float) $variant->price;
                $variationSpecifics = new Types\NameValueListArrayType();
                $colorSizes = Share::variant2array($variant->detail);
                foreach ($colorSizes as $key => $colorSize) {
                    $nameValue = new Types\NameValueListType();
                    $nameValue->Name = $key;
                    $nameValue->Value = [$colorSize];
                    $variationSpecifics->setNameValueList($nameValue);
                }
                $variation->setVariationSpecifics($variationSpecifics);
                $item->Variations->setVariation($variation);
            }
        }
    }

    public function addDetailPicture(&$item, $product)
    {
        if (empty($product->mainImage())) {
            Log::channel('syncproducttoebaylog')->info('No Detail Picture ' . $product->name);

            return;
            // throw new \Exception('No Detail Picture ' . $product->id . '-' . $product->name);
        }
        $pictureDetails = new Types\PictureDetailsType();

        $pictureDetails->setPictureURL(ENV('APP_URL') . $product->mainImage()->name);
        $item->PictureDetails = $pictureDetails;
    }

    public function addImageToEbay(&$item, $product)
    {
        if ($product->variantImages()->count() > 0) {
            $pictures = new Types\PicturesType();
            $pictures->VariationSpecificName = 'Color';
            $colorPictures = [];

            $images = $product->variantImages();
            foreach ($images as $image) {
                if ($image->color_id > 0) {
                    $color = Color::find($image->color_id);
                    $colorPictures[$color->name][] = env('APP_URL') . $image->name;
                }
            }
            foreach ($colorPictures as $color => $picture) {
                $pictureSet = new Types\VariationSpecificPictureSetType();
                $pictureSet->VariationSpecificValue = $color;

                foreach ($picture as $image) {
                    $pictureSet->PictureURL[] = $image;
                }
                $pictures->setVariationSpecificPictureSet($pictureSet);
            }
            $item->Variations->setPictures($pictures);
        }
    }

    public function createByTemplate($data = [])
    {
        // DB::beginTransaction();
        try {
            $templateId = $data[0];
            Log::info('begin importing ' . $data[1]);
            Log::info('Template ID ' . $templateId);

            $template = ListingTemplate::find($templateId);
            if (is_null($template)) {
                return;
            }
            $productData = [
                'condition_id' => $template->condition_id,
                'name' => ($data[1] ? $data[1] : $template->title),
                'description' => $template->description,
                'category_id' => $template->category_id,
            ];
            $product = $this->model->create($productData);
            $productId = $product->id;
            Log::info('Product ID ' . $productId);
            $productAccountRepo = new ProductAccountRepository();
            $productAccountRepo->createByTemplate($template, $productId);
            Log::info('Created product account');
            $prodAttrRepo = new ProductAttributeRepository();
            $color = $prodAttrRepo->createByTemplate($template, $productId);
            $variantRepo = new VariantRepository();
            $variantRepo->createVariantFromTemplate($product, $template, $color);
            $imageRepo = new ImageRepository();
            $imageRepo->createByTemplate($productId, $data);
            Log::info('Imported Product ' . $product->name);
        } catch (\Exception $ex) {
            Log::error('Import product error ' . $ex->getMessage());
            // DB::rollback();
        }
        // DB::commit();
    }

    protected function addPrimaryColorAndSize(&$item, $product)
    {
        $variationSpecificsSet = new Types\NameValueListArrayType();

        if ($product->variants()->count()) {
            $colorAndSizes = [];
            foreach ($product->variants as $variant) {
                foreach ($variant->variant_options as $vOption) {
                    $colorAndSizes[$vOption->variant_attribute->name][] = $vOption->value;
                }
            }

            foreach ($colorAndSizes as $key => $colorSize) {
                $nameValue = new Types\NameValueListType();
                $nameValue->Name = $key;
                $nameValue->Value = array_unique($colorSize);
                $variationSpecificsSet->setNameValueList($nameValue);
            }
            $item->Variations->VariationSpecificsSet = $variationSpecificsSet;
        }
    }

    protected function addLocationAndPaypal(&$item, $productAccount)
    {
        /*
         * Provide enough information so that the item is listed.
         * It is beyond the scope of this example to go into any detail.
         */

        $item->ListingType = Enums\ListingTypeCodeType::C_FIXED_PRICE_ITEM;
        $item->ListingDuration = Enums\ListingDurationCodeType::C_GTC;

        $item->Country = $productAccount->country_iso;
        $item->Location = $productAccount->location;
        $item->PostalCode = $productAccount->postcode;

        $item->Currency = 'USD';
        if (empty($productAccount->paymentPolicy)) {
            return;
        }
        $paymentPolicy = $productAccount->paymentPolicy;
        $item->PaymentMethods[] = $paymentPolicy->name;
        $item->PayPalEmailAddress = $paymentPolicy->paypal_recipient_account;
    }

    protected function addAttribute(&$item, $product)
    {
        $attributes = $product->attributes;

        if (!empty($attributes)) {
            $item->ItemSpecifics = new Types\NameValueListArrayType();
            $this->addBrandToEbay($item, $product);
            foreach ($attributes as $attr) {
                $nameValue = new Types\NameValueListType();
                $nameValue->Name = $attr->name;
                $nameValue->Value = [$attr->value];
                $item->ItemSpecifics->setNameValueList($nameValue);
            }
        }
    }

    protected function addReturnPolicy(&$item, $productAccount)
    {
        /**
         * The return policy.
         * Returns are accepted.
         * A refund will be given as money back.
         * The buyer will have 30 days in which to contact the seller after receiving the item.
         * The buyer will pay the return shipping cost.
         */
        $returnPolicy = $productAccount->returnPolicy;

        if (empty($returnPolicy)) {
            return;
        }
        $item->ReturnPolicy = new Types\ReturnPolicyType();

        if (1 == $returnPolicy->returns_accepted) {
            $returnWithinOption = ucfirst(strtolower($returnPolicy->return_period_unit)) . 's_' . $returnPolicy->return_period_value;
            $item->ReturnPolicy->ReturnsAcceptedOption = 'ReturnsAccepted';
            $item->ReturnPolicy->RefundOption = Enums\RefundOptionsCodeType::C_MONEY_BACK;
            $item->ReturnPolicy->ReturnsWithinOption = $returnWithinOption;
            $item->ReturnPolicy->ShippingCostPaidByOption = ucfirst(strtolower($returnPolicy->return_shipping_cost_payer));
        } else {
            $item->ReturnPolicy->ReturnsAcceptedOption = 'ReturnsNotAccepted';
        }
    }

    protected function addShippingPolicy(&$item, $productAccount)
    {
        if (is_null($productAccount->fulfillment_policy_id)) {
            return;
        }
        $fulfillmentPolicy = $productAccount->fulfillmentPolicy;

        if (empty($fulfillmentPolicy)) {
            return;
        }
        $item->DispatchTimeMax = 10;
        $item->ShippingDetails = new Types\ShippingDetailsType();
        $item->ShippingDetails->ShippingType = Enums\ShippingTypeCodeType::C_FLAT;

        foreach ($fulfillmentPolicy->shipping_options as $option) {
            if ('FLAT_RATE' == $option['costType']) {
                if (Enums\ShippingServiceType::C_DOMESTIC == $option['optionType']) {
                    foreach ($option['shippingServices'] as $shipping) {
                        $shippingService = new ShippingServiceOptionsType();
                        $shippingService->ShippingServicePriority = $shipping['sortOrder'];
                        $shippingService->ShippingService = $shipping['shippingServiceCode'];
                        $shippingService->ShippingServiceCost = (float) $shipping['shippingCost']['value'];
                        $shippingService->ShippingServiceAdditionalCost = (float) $shipping['additionalShippingCost']['value'];
                        $item->ShippingDetails->setShippingServiceOptions($shippingService);
                    }
                }
                // option type is INTERNATIONAL

                    // foreach ($option['shippingServices'] as $shipping) {
                    //     $shippingService = new InternationalShippingServiceOptionsType();
                    //     $shippingService->ShippingServicePriority = $shipping['sortOrder'];
                    //     $shippingService->ShippingService = $shipping['shippingServiceCode'];
                    //     $shippingService->ShippingServiceCost = (float)$shipping['shippingCost']['value'];
                    //     $shippingService->ShippingServiceAdditionalCost = (float)$shipping['additionalShippingCost']['value'];
                    //     $shippingService->setShipToLocation($shipping['shipToLocations']['regionIncluded'][0]['regionName']);
                    //     $shippingService->ShipToLocation = [$shipping['shipToLocations']['regionIncluded'][0]['regionName']];
                    //     $item->ShippingDetails->setShippingServiceOptions($shippingService);
                    // }
            }
        }
    }

    private function buildItem($product, $productAccount)
    {
        /**
         * Begin creating the fixed price item.
         */
        $item = new Types\ItemType();

        // The item is T-Shirts in various color and sizes.
        $item->Title = $product->name;
        $item->Description = $product->description;

        /*
         * Tell buyers what condition the item is in.
         * For the category that we are listing in the value of 1000 is for Brand New.
         */
        $item->ConditionID = $product->condition_id;

        $item->PrimaryCategory = new Types\CategoryType();
        $item->PrimaryCategory->CategoryID = strval($product->category_id);

        $item->Variations = new Types\VariationsType();

        $this->addPrimaryColorAndSize($item, $product);

        $this->addVariantToEbay($item, $product);
        $this->addDetailPicture($item, $product);
        $this->addImageToEbay($item, $product);
        $this->addAttribute($item, $product);

        $this->addLocationAndPaypal($item, $productAccount);
        $this->addReturnPolicy($item, $productAccount);
        $this->addShippingPolicy($item, $productAccount);

        return $item;
    }
}
