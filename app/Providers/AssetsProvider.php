<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\Assets\Manager;

class AssetsProvider extends ServiceProvider
{

    public function register(): void
    {
        // Hook initialization safe: فقط هنگام enqueue اجرا شود
        add_action('wp_enqueue_scripts', function () {
            $manager = new Manager();
//            new \VANTI\Assets\Manager();
        });

        add_action('admin_enqueue_scripts', function () {
            $manager = new Manager();
        });
    }
}