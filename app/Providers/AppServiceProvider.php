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
            $settings = SiteSetting::current();

            $view->with('menuHeader', MenuItem::forLocation('header_desktop', $branchId));
            $view->with('menuFooter', MenuItem::forLocation('footer', $branchId));
            $view->with('networkName', $settings?->network_name ?? 'Сеть подологии');
            $view->with('scheduleLabel', $settings?->schedule_label);
            $view->with('defaultPhone', $settings?->default_phone);
            $view->with('branches', Branch::where('is_active', true)->orderBy('city')->get());
        });
    }
}
