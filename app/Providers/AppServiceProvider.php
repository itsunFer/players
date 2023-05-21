<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('no_null_values', function ($attribute, $value, $parameters, $validator) {
            foreach ($value as $item) {
                if ($item === null) {
                    return false;
                }
            }
            return true;
        });
    
        Validator::replacer('no_null_values', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must not contain null values.');
        });
    }
}
