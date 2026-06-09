<?php

namespace VANTI;

use Throwable;
use VANTI\Core\Application;
use VANTI\Providers\ThemeProvider;
use VANTI\Providers\AssetsProvider;
use VANTI\Providers\WooCommerceProvider;

class Bootstrap
{
    public static function boot(): void
    {
        try {
            $app = new Application();

            $app->register(new ThemeProvider());
            $app->register(new AssetsProvider());
            $app->register(new WooCommerceProvider());

        } catch (Throwable $e) {

            error_log('[VANTI ERROR] ' . $e->getMessage());
            error_log($e->getTraceAsString());

            // اجازه بده وردپرس بالا بیاد
            return;
        }
    }
}