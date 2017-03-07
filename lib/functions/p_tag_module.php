<?php
// 自動挿入されるPタグを削除
add_action('init', function() {
    remove_filter('the_excerpt', 'wpautop');
    remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function($init) {
    $init['wpautop'] = false;
    $init['apply_source_formatting'] = true;
    return $init;
});