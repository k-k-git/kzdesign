<?php
// Custom Post Type UIの日本語化ファイルをすでにあるものより優先して読み込ませるようにします。
function override_load_cptui_ja( $override, $domain, $mofile ) {
  if ( 'cpt-plugin' == $domain
    && strrpos( $mofile, WP_PLUGIN_DIR . '/custom-post-type-ui/languages/cpt-plugin-ja.mo' ) === 0 ) {
    load_textdomain( 'cpt-plugin', WP_LANG_DIR . '/plugins/cpt-plugin-ja.mo' );
    return true;
  }
  return $override;
}
add_filter( 'override_load_textdomain', 'override_load_cptui_ja', 10, 3 );