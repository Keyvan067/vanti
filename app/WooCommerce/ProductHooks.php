<?php


namespace VANTI\WooCommerce;

class ProductHooks
{
    public function __construct()
    {
        add_action('woocommerce_before_shop_loop_item_title', [$this, 'showBadge'], 5);
    }

    public function showBadge(): void
    {
        echo '<span class="vanti-badge">NEW</span>';
    }
}