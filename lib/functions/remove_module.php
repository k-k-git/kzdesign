<?php
// 標準で吐き出すソースを削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'wp_shortlink_wp_head');
// generatorを非表示にする
remove_action('wp_head', 'wp_generator');
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
// wlwmanifestを非表示にする
remove_action('wp_head', 'wlwmanifest_link');
// WordPress 4.6 DNS プリフェッチを非表示
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
// コンタクトフォームセブン必要な時だけ読み込み
function my_contact_enqueue_scripts(){
wp_deregister_script('contact-form-7');
wp_deregister_style('contact-form-7');
if (is_page('contact')) {
    if (function_exists( 'wpcf7_enqueue_scripts')) {
        wpcf7_enqueue_scripts();
    }
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
    wpcf7_enqueue_styles();
    }
}
}
add_action( 'wp_enqueue_scripts', 'my_contact_enqueue_scripts');
//WP-PageNavieが読み込むCSSを削除
add_action( 'wp_enqueue_scripts', 'my_delete_plugin_styles' );
    function my_delete_plugin_styles() {
    wp_deregister_style( 'wp-pagenavi' );
}
// 保護中 削除
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
       return '%s';
}