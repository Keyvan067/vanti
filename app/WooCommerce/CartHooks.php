<?php

namespace VANTI\WooCommerce;

class CartHooks
{
    public function __construct()
    {
        add_action('woocommerce_cart_collaterals', [$this, 'customMessage']);
    }

    public function customMessage(): void
    {
        echo '<p class="vanti-cart-note">Thank you for shopping!</p>';
    }
}