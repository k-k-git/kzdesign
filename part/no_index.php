<!-- all (no_index.php)
======================================================================================================================================== -->
    <?php
    // 投稿個別ページと固定ページだけを対象にする
    if ( is_single() || is_page() ) {
      // noindex が設定された場合
      if( get_post_meta($post->ID, "noindex", true) ) {
        // noffolow が設定された場合
        if( get_post_meta($post->ID, "nofollow", true) ) {
          // noindex と nofollow を設定
          echo "<meta name='robots' content='noindex,nofollow' />";
        }
        else {
          // noindex のみを設定
          echo "<meta name='robots' content='noindex,follow' />";
        }
      }
      // nofollow のみは基本的に需要が無いので処理から除外
    }
    ?>
    <?php print("\n"); ?>