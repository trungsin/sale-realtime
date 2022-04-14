<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = ['id'];

    /**
     * Get all of the owning imageable models.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Get all of the owning imageable models.
     */
    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }
}
