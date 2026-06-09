<?php

namespace VANTI\WooCommerce;

class CheckoutHooks
{
    public function __construct()
    {
        add_action('woocommerce_before_checkout_form', [$this, 'checkoutNotice']);
    }

    public function checkoutNotice(): void
    {
        echo '<p class="vanti-checkout-note">Free shipping on orders over $50!</p>';
    }
}