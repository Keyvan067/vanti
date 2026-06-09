<?php

namespace VANTI\WooCommerce;

class ArchiveHooks
{
    public function __construct()
    {
        add_action('woocommerce_before_shop_loop', [$this, 'archiveNotice']);
    }

    public function archiveNotice(): void
    {
        echo '<p class="vanti-archive-note">Check our latest products!</p>';
    }
}