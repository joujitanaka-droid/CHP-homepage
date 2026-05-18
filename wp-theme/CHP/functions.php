<?php
/**
 * 金属リサイクルセンター (CHP) テーマ functions.php
 */

// 親テーマのスタイルを読み込む
add_action('wp_enqueue_scripts', 'chp_enqueue_styles');
function chp_enqueue_styles() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'chp-main-style',
        get_stylesheet_directory_uri() . '/assets/css/style.css',
        ['parent-style'],
        '1.0.0'
    );
    wp_enqueue_script(
        'chp-main-script',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true  // フッターで読み込み
    );
}

// CHPページではWordPressデフォルトのheader/footerを非表示にする（任意）
// テンプレート側で get_header()/get_footer() を省略すれば自動的に適用されます
