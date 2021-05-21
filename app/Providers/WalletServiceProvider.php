<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $models = array(
            'Bank',
            'Bonus'
        );
        foreach ($models as $model) {
            $this->app->bind("App\libs\Wallet\\WalletInterface", "App\libs\Wallet\\{$model}Wallet");
        }

       // $this->app->bind("App\libs\Wallet\\WalletServiceInterface", "App\libs\Wallet\\WalletService");

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
