<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class PolymorphicTypeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Relation::morphMap([
            'variants' => 'App\Models\Variant',
            'colors' => 'App\Models\Color',
        ]);
    }
}
