<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\MenuItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $branchId = isset($view->getData()['branch']) ? $view->getData()['branch']->id : null;

            $view->with('menuHeader', MenuItem::forLocation('header_desktop', $branchId));
            $view->with('menuFooter', MenuItem::forLocation('footer', $branchId));
            $view->with('networkName', SiteSetting::current()?->network_name ?? 'Сеть подологии');
            $view->with('branches', Branch::where('is_active', true)->orderBy('city')->get());
        });
    }
}
