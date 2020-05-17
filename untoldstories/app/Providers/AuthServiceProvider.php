<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;
use Illuminate\Support\Facades\Gate;
use App\Foto_profils;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        view()->composer('admin.layouts.navbar', function($view)
            {
                $data = Auth::user();
                $foto = Foto_profils::where('users_id', $data->id);
                $view->with(compact('data','foto'));
            }
        );
    }
}
