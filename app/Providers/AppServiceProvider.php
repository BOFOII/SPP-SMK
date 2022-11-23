<?php

namespace App\Providers;

use App\Composers\MetaTitle;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

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
        FacadesView::composer([
            'layouts.main-layout',
            'components.header'
        ], MetaTitle::class);
    }
}
