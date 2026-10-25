<?php
/**
 * まちの資源ステーションCHP テーマ functions.php
 */

// 親テーマのスタイルを読み込む
add_action('wp_enqueue_scripts', 'chp_enqueue_styles');
function chp_enqueue_styles() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // 法人向け(page-corporate.php)・買取価格(page-prices.php)ページは、専用の別デザイン(緑系)を読み込む。
    // TOPページは従来どおりオレンジ/ブルー系のstyle.css/main.jsを使う。
    // 注: このテーマは`_wp_page_template`メタを使わず、スラッグ一致(page-{slug}.php)の
    // テンプレート階層で自動解決されるため、is_page_template()ではなくis_page()で判定する。
    if (is_page('corporate') || is_page('prices')) {
        wp_enqueue_style(
            'chp-corporate-style',
            get_stylesheet_directory_uri() . '/assets/css/corporate-mock.css',
            ['parent-style'],
            chp_asset_version('/assets/css/corporate-mock.css')
        );
        wp_enqueue_script(
            'chp-corporate-script',
            get_stylesheet_directory_uri() . '/assets/js/corporate-mock.js',
            [],
            chp_asset_version('/assets/js/corporate-mock.js'),
            true
        );

        // 買取価格ページのみ、Googleスプレッドシート連携の価格取得スクリプトも読み込む。
        if (is_page('prices')) {
            wp_enqueue_script(
                'chp-price-loader',
                get_stylesheet_directory_uri() . '/assets/js/price-loader.js',
                [],
                chp_asset_version('/assets/js/price-loader.js'),
                true
            );
        }
        return;
    }

    wp_enqueue_style(
        'chp-main-style',
        get_stylesheet_directory_uri() . '/assets/css/style.css',
        ['parent-style'],
        chp_asset_version('/assets/css/style.css')
    );
    wp_enqueue_script(
        'chp-main-script',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        [],
        chp_asset_version('/assets/js/main.js'),
        true  // フッターで読み込み
    );
}

// テーマ内アセットの更新日時をバージョン文字列として使い、静的ファイルの
// キャッシュ(Cache-Control: max-age=604800)によって編集内容が反映されない事故を防ぐ。
function chp_asset_version($relative_path) {
    $file = get_stylesheet_directory() . $relative_path;
    return file_exists($file) ? (string) filemtime($file) : '1.0.0';
}

// CHPページではWordPressデフォルトのheader/footerを非表示にする（任意）
// テンプレート側で get_header()/get_footer() を省略すれば自動的に適用されます
