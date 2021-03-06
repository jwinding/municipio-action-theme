<?php

namespace ActionHbg\Theme;

use ActionHbg\Helper\CacheBust as CacheBust;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'));
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style(
            'ActionHbg',
            get_stylesheet_directory_uri() .
                        '/assets/dist/' .
                        CacheBust::name('css/app.css'),
            array(),
            ''
        );

        wp_enqueue_style(
            'ActionHbg-admin',
            get_stylesheet_directory_uri() .
                        '/assets/dist/' .
                        CacheBust::name('css/admin.css'),
            array(),
            ''
        );
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_register_script(
            'ActionHbg-js',
            get_stylesheet_directory_uri() .
                        '/assets/dist/' .
                        CacheBust::name('js/app.js'),
            array('jquery'),
            false,
            true
        );

        wp_enqueue_script('ActionHbg-js');
    }
}
