<?php

namespace App\Library\ImageFilters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class ThumbnailTemplate implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $size = config('imagecache.sizes.thumbnail');

        return $image->fit($size['width'], $size['height']);
    }
}
