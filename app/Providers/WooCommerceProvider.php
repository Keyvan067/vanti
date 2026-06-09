<?php

namespace VANTI\Providers;

use VANTI\Core\ServiceProvider;
use VANTI\WooCommerce\ProductHooks;
use VANTI\WooCommerce\CartHooks;
use VANTI\WooCommerce\CheckoutHooks;
use VANTI\WooCommerce\ArchiveHooks;

class WooCommerceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (!class_exists('WooCommerce')) {
            return; // WooCommerce not active
        }

        new ProductHooks();
        new CartHooks();
        new CheckoutHooks();
        new ArchiveHooks();
    }
}