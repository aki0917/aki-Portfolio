<?php

function pf2_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style(
        'pf2-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'pf2-style',
        $theme_uri . '/css/style.css',
        ['pf2-google-fonts'],
        wp_get_theme()->get('Version')
    );

    // GSAP
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        [],
        '3.12.5',
        true
    );
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        ['gsap'],
        '3.12.5',
        true
    );
    wp_enqueue_script(
        'gsap-scrollto',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js',
        ['gsap'],
        '3.12.5',
        true
    );

    // Main script
    wp_enqueue_script(
        'pf2-main',
        $theme_uri . '/js/main.js',
        ['gsap', 'gsap-scrolltrigger', 'gsap-scrollto'],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'pf2_enqueue_assets');

function pf2_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'pf2_setup');

function pf2_google_fonts_preconnect( $urls, $relation_type ) {
    if ( $relation_type === 'preconnect' ) {
        $urls[] = [
            'href' => 'https://fonts.googleapis.com',
        ];
        $urls[] = [
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'pf2_google_fonts_preconnect', 10, 2);

// ==========================================================================
// Custom Post Type: Work
// ==========================================================================
function pf2_register_work_post_type() {
    register_post_type('work', [
        'labels' => [
            'name'               => '実績',
            'singular_name'      => '実績',
            'add_new'            => '新規追加',
            'add_new_item'       => '実績を追加',
            'edit_item'          => '実績を編集',
            'new_item'           => '新しい実績',
            'view_item'          => '実績を表示',
            'search_items'       => '実績を検索',
            'not_found'          => '実績が見つかりません',
            'not_found_in_trash' => 'ゴミ箱に実績はありません',
            'menu_name'          => '実績（Work）',
        ],
        'public'              => true,
        'publicly_queryable'  => false,
        'has_archive'         => false,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => ['title', 'thumbnail'],
        'menu_position' => 5,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'pf2_register_work_post_type');

// ==========================================================================
// ACF Fields for Work (registered via PHP)
// ==========================================================================
function pf2_register_acf_fields() {
    if ( ! function_exists('acf_add_local_field_group') ) {
        return;
    }

    acf_add_local_field_group([
        'key'      => 'group_work_fields',
        'title'    => '実績の詳細',
        'fields'   => [
            [
                'key'          => 'field_work_url',
                'label'        => 'サイトURL',
                'name'         => 'work_url',
                'type'         => 'url',
                'instructions' => '実績サイトのURLを入力してください',
            ],
            [
                'key'          => 'field_work_category',
                'label'        => 'カテゴリ',
                'name'         => 'work_category',
                'type'         => 'text',
                'instructions' => '例: Web Design / Development / SEO',
                'default_value' => 'Web Design / Development',
            ],
            [
                'key'          => 'field_work_number',
                'label'        => '表示番号',
                'name'         => 'work_number',
                'type'         => 'text',
                'instructions' => '例: 01, 02, 03',
            ],
            [
                'key'           => 'field_work_blur',
                'label'         => 'サムネイルをぼかす',
                'name'          => 'work_blur',
                'type'          => 'true_false',
                'instructions'  => '非公開・準備中の場合はONにしてください',
                'default_value' => 0,
                'ui'            => 1,
            ],
            [
                'key'          => 'field_work_auth_memo',
                'label'        => '認証メモ',
                'name'         => 'work_auth_memo',
                'type'         => 'text',
                'instructions' => 'Basic認証がある場合に入力（例: ID: user / PW: pass）',
            ],
        ],
        'location' => [
            [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'work',
                ],
            ],
        ],
        'menu_order' => 0,
        'position'   => 'normal',
        'style'      => 'default',
    ]);
}
add_action('acf/init', 'pf2_register_acf_fields');

// ==========================================================================
// Contact Form 7
// ==========================================================================
add_filter('wpcf7_load_css', '__return_false');
add_filter('wpcf7_autop_or_not', '__return_false');

function pf2_render_contact_form() {
    if ( ! shortcode_exists('contact-form-7') ) {
        return;
    }

    $forms = get_posts([
        'post_type'      => 'wpcf7_contact_form',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'ASC',
    ]);

    if ( ! empty($forms) ) {
        echo do_shortcode('[contact-form-7 id="' . $forms[0]->ID . '"]');
    }
}
