<?php
// 文字抜粋
function new_excerpt_mblength($length) {
     return 300;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');
function new_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');