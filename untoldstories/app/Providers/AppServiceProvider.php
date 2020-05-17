<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\kategori;
use App\artikel;
use App\tag;

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
        view()->composer('layout.headerhome', function($view)
            {
                $kategori = kategori::all();
                $view->with('kategori', $kategori);
            }
        );

        view()->composer('layout.headerartikel', function($view)
            {
                $kategori = kategori::all();
                $view->with('kategori', $kategori);
            }
        );

        view()->composer('layout.footer', function($view)
            {
                $artlimit = artikel::orderBy('id', 'DESC')->with('FotoBlog')->limit(6)->get();
                $tag = tag::all();
                $view->with(['artlimit'=>$artlimit, 'tag'=>$tag]);
            }
        );
    }
}
