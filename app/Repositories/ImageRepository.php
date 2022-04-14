<?php

namespace App\Repositories;

use App\Models\Color;
use App\Respositories\RespositoryAbstract;
use App\Models\Image;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\Log;

/**
 * Class ImageRepository
 *
 * @package App\Repositories
 */
class ImageRepository extends RespositoryAbstract
{
    use UploadFile;

	// variable
	protected CONST STRING_DEFAULT = "";

	/**
     * Function getModel
     *
     * @return model
     */
	public function getModel()
	{
		return Image::class;
    }

    public function createByTemplate($productId, $data)
    {
        // foreach ($data as $row) {
            Log::info('Creating product image');
            $rootFolder = config('constants.images.product.root');
            $listSize = config('constants.images.product.size');
            $color = Color::firstOrCreate(['name' => 'Black']);

            $originalFile = file_get_contents($data[2]);
            $images = $this->processUploadImage($originalFile, $rootFolder, $listSize);

            if (400 === $images['msgCode']) {
                Log::error('Original image uploading is failed');
            }
            $originalPath = $images['image']['original'];

            $input = [];
            $input['name'] = $originalPath;
            $input['product_id'] = $productId;
            $input['image_type'] = 'Main';
            $input['color_id'] = $color->id;
            $this->model->create($input);
            Log::info('Created product image');
        // }
    }

}
