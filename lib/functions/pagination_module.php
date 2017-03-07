<?php
// ページ送り
function pagination() {
  global $wp_rewrite;
  global $wp_query;
  global $paged;
    $paginate_base = get_pagenum_link(1);
    if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
        $paginate_format = '';
        $paginate_base = add_query_arg('paged','%#%');
    }
    else{
        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/','paged');;
        $paginate_base .= '%_%';
    }
   //paginationの出力
   echo '<ul class="pagination">';
   echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 2,
        'current' => ($paged ? $paged : 1),
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
        'type'      => 'list',
    ));
   echo '</ul>';
}