<?php
// サイトのURLを出力
add_shortcode('url', 'shortcode_url');
function shortcode_url() {
return get_bloginfo('url');
}
// アップロード・ディレクトリへのパス
add_shortcode('uploads', 'shortcode_up');
function shortcode_up() {
$upload_dir = wp_upload_dir();
return $upload_dir['baseurl'];
}
// サイドウィジェットでもショートコードを使えるように
add_filter('widget_text', 'do_shortcode');