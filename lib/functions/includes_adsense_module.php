<?php
//H2見出しを判別する正規表現を定数にする
define('H2_REG', '/<h2.*?>/i');//H2見出しのパターン
//本文中にH2見出しが最初に含まれている箇所を返す（含まれない場合はnullを返す）
//H3-H6しか使っていない場合は、h2部分を変更してください
function get_h2_included_in_body( $the_content ){
  if ( preg_match( H2_REG, $the_content, $h2results )) {//H2見出しが本文中にあるかどうか
    return $h2results[0];
  }
}
function add_ads_before_1st_h2($the_content) {
  if ( is_single() ) {//固定ページも表示する場合はis_singular()にする
    //広告（AdSense）タグを記入
    ob_start();//バッファリング
    if ( wp_is_mobile() ) {
      get_template_part('part/adsense_post_heading_top_sm');//モバイル広告用テンプレート
    } else {
      get_template_part('part/adsense_post_heading_top_pc');//PC広告用テンプレート
    }
    $ad_template = ob_get_clean();
    $h2result = get_h2_included_in_body( $the_content );//本文にH2タグが含まれていれば取得
    if ( $h2result ) {//H2見出しが本文中にある場合のみ
      //最初のH2の手前に広告を挿入（最初のH2を置換）
      $the_content = preg_replace(H2_REG, $ad_template.$h2result, $the_content, 1);
    }
  }
  return $the_content;
}
add_filter('the_content','add_ads_before_1st_h2');