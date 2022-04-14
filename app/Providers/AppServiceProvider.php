<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use DB;

use App\Models\Account;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('uniqueColorAndSize', function ($attribute, $value, $parameters, $validator) {
            $where = [
                ['size_id', $value],
                ['color_id', $parameters[1]],
                ['product_id', $parameters[2]]
            ];
            if (! empty($parameters[3])) {
                $where[] = ['id', '!=', $parameters[3]];
            }

            $count = DB::table($parameters[0])->where($where)->count();
            return $count === 0;
        });
    }
}
