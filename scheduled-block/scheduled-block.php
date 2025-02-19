<?php
/**
 * Plugin Name: Scheduled Block
 * Description: Control the visibility of content with a schedule. Place one or more blocks inside this container and set specific start and end times. The inner blocks will display only during the designated period, making it easy to manage time-sensitive content on your site. Once you set it up, there's no need to go back and edit the page or post - just set it and forget it!
 * Version: 1.0.8
 * Author: Michael Miller Jr
 * Author URI: https://www.linkedin.com/in/michael-r-miller-jr
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

add_action('init', 'schebl_scheduled_block_init');
function schebl_scheduled_block_init() {
    wp_register_script(
        'scheduled-block-editor',
        plugins_url('scheduled-block-editor.js', __FILE__),
        ['wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-i18n'],
        filemtime(plugin_dir_path(__FILE__) . 'scheduled-block-editor.js'), // Version parameter
        true // Load in footer
    );

    // Register editor style
    wp_register_style(
        'scheduled-block-editor-style',
        plugins_url('scheduled-block.css', __FILE__),
        [],
        filemtime(plugin_dir_path(__FILE__) . 'scheduled-block.css')
    );

    register_block_type('scheduled-block/block', [
        'editor_script' => 'scheduled-block-editor',
        'editor_style'  => 'scheduled-block-editor-style',
        'attributes' => [
            'startDateTime' => [
                'type'              => 'string',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field'
            ],
            'endDateTime' => [
                'type'              => 'string',
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field'
            ]
        ],
        'render_callback' => 'schebl_scheduled_block_render'
    ]);
}

function schebl_scheduled_block_render($attributes, $content) {
    // Sanitize input first
    $start_date = isset($attributes['startDateTime']) ? sanitize_text_field($attributes['startDateTime']) : '';
    $end_date   = isset($attributes['endDateTime'])   ? sanitize_text_field($attributes['endDateTime'])   : '';

    // Validate date format
    if (!empty($start_date) && !DateTime::createFromFormat('Y-m-d\TH:i:s', $start_date)) {
        return '';
    }
    if (!empty($end_date) && !DateTime::createFromFormat('Y-m-d\TH:i:s', $end_date)) {
        return '';
    }

    // Get WordPress timezone
    $wp_timezone   = schebl_get_wp_timezone();
    $utc_timezone  = new DateTimeZone('UTC');
    $now           = new DateTime('now', $utc_timezone);

    try {
        // Convert start date to UTC
        if (!empty($start_date)) {
            $start = new DateTime($start_date, $wp_timezone);
            $start->setTimezone($utc_timezone);
            if ($now < $start) {
                return '';
            }
        }

        // Convert end date to UTC
        if (!empty($end_date)) {
            $end = new DateTime($end_date, $wp_timezone);
            $end->setTimezone($utc_timezone);
            if ($now > $end) {
                return '';
            }
        }
    } catch (Exception $e) {
        return '';
    }

    // Escape output
    return wp_kses_post($content);
}

function schebl_get_wp_timezone() {
    $timezone_string = get_option('timezone_string');
    if (!empty($timezone_string)) {
        return new DateTimeZone($timezone_string);
    }

    $offset  = (float) get_option('gmt_offset');
    $hours   = (int) $offset;
    $minutes = ($offset - $hours) * 60;
    $offset  = sprintf('%+03d:%02d', $hours, $minutes);
    return new DateTimeZone($offset);
}

// Caching prevention
add_filter('wp_insert_post_data', 'schebl_disable_caching_for_scheduled_block_pages', 10, 2);
function schebl_disable_caching_for_scheduled_block_pages($data, $postarr) {
    if (strpos($data['post_content'], '<!-- wp:scheduled-block/block') !== false) {
        add_action('wp_head', 'schebl_add_no_cache_headers');
        if (!defined('SCHEBL_DONOTCACHEPAGE')) {
            define('SCHEBL_DONOTCACHEPAGE', true);
        }
    }
    return $data;
}

add_action('template_redirect', 'schebl_force_dynamic_rendering_for_scheduled_block');
function schebl_force_dynamic_rendering_for_scheduled_block() {
    global $post;
    if (is_a($post, 'WP_Post') && has_block('scheduled-block/block', $post)) {
        schebl_add_no_cache_headers();
        if (!defined('SCHEBL_DONOTCACHEPAGE')) {
            define('SCHEBL_DONOTCACHEPAGE', true);
        }
    }
}

function schebl_add_no_cache_headers() {
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
}
