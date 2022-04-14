<?php

namespace App\Library\ImageFilters;

use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;

class IconTemplate implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $size = config('imagecache.sizes.icon');

        return $image->fit($size['width'], $size['height']);
    }
}
