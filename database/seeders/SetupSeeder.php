<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate([], [
            'network_name' => 'Сеть подологических клиник',
            'default_phone' => '',
            'footer_copyright' => '© ' . date('Y'),
        ]);

        $menu = [
            ['location' => 'header_desktop', 'title' => 'Главная', 'url' => '/', 'sort_order' => 1],
            ['location' => 'header_desktop', 'title' => 'Филиалы', 'url' => '/filialy/ufa', 'sort_order' => 2],
            ['location' => 'footer', 'title' => 'Главная', 'url' => '/', 'sort_order' => 1],
            ['location' => 'footer', 'title' => 'Политика конфиденциальности', 'url' => '/privacy/', 'sort_order' => 2],
        ];

        foreach ($menu as $item) {
            MenuItem::firstOrCreate(
                ['location' => $item['location'], 'url' => $item['url']],
                $item + ['is_active' => true]
            );
        }
    }
}
