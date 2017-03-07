<?php
// 新着記事URL獲得
function get_latest_post_url() {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->prefix}posts WHERE post_type='post' AND post_status='publish' ORDER BY post_date DESC LIMIT 1;";
    $result = $wpdb->get_results($query);
    if(is_object($result[0])) {
        return get_permalink($result[0]->ID);
    } else {
        return '';
    };
}