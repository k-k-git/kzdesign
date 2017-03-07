<?php
// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
//アイキャッチ画像の定義と切り抜き
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
 add_image_size('small_thumbnail', 90, 90 ,true );
 add_image_size('kiji', 610, 200, true );
 add_image_size('650', 650, 230, true );
 add_image_size('430', 430, 250, true );
 add_image_size('460', 460, 250, true );
 add_image_size('350', 350, 250, true );
 add_image_size('slidepc', 722, 340, true );
 add_image_size( '120', 120, 120, true );
 add_image_size( 's_thumbnail', 80, 80, true );
 add_image_size('280_thumbnail', 280, 125, true );
}
// アイキャッチ画像出力
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
        $first_img = "http://www.fsc-net.jp/fsbc/wp-content/themes/fsbc/img/no_image325.gif";
    }
    return $first_img;
}