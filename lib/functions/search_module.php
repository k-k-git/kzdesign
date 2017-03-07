<?php
// 検索ワードが0や未入力のときにもsearch.phpを使うように追記
function search_template_redirect() {
  global $wp_query;
  $wp_query->is_search = true;
  $wp_query->is_home = false;
  if (file_exists(TEMPLATEPATH . '/search.php')) {
    include(TEMPLATEPATH . '/search.php');
  }
  exit;
}
if (isset($_GET['s']) && $_GET['s'] == false) {
  add_action('template_redirect', 'search_template_redirect');
}
// 検索結果を投稿ページのみに
function my_posy_search($search) {
  if(is_search()) {
    $search .= " AND post_type = 'post'";
  }
  return $search;
}
add_filter('posts_search', 'my_posy_search');