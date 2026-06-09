<?php

namespace VANTI\Assets;

class Manager
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function enqueue_frontend_assets()
    {

        wp_enqueue_style(
            'vanti-app',
            VANTI_URL . '/dist/assets/app-DNANV5qU.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-app',
            VANTI_URL . '/dist/assets/app-zRbIOdxG.js',
            [],
            VANTI_VERSION,
            true
        );
    }

    public function enqueue_admin_assets()
    {

        wp_enqueue_style(
            'vanti-admin',
            VANTI_URL . '/public/css/admin.css',
            [],
            VANTI_VERSION
        );

        wp_enqueue_script(
            'vanti-admin',
            VANTI_URL . '/public/js/admin.js',
            [],
            VANTI_VERSION,
            true
        );
    }
}