<?php
// JSインクルード一元管理
    function register_script(){
        // wp_register_script('migrate', get_bloginfo('template_directory').'/js/jquery-migrate-1.2.1.min.js', array(), '20170203', true );
        wp_register_script('jquery', get_bloginfo('template_directory').'/assets/js/jquery-3.1.1.min.js', array(), '20170203', true );
        wp_register_script('widgets_js', '//platform.twitter.com/widgets.js', array(), '20170203', true );
        wp_register_script('grid', get_settings('site_url').'/wp-content/themes/barcelona/assets/js/masonry.pkgd.min.js', array(), '20170203', true  );
        wp_register_script('customize', get_settings('site_url').'/wp-content/themes/barcelona/assets/js/customize.js', array(), '20170205', true );
        // wp_register_script('bootstrap_lightbox', get_settings('site_url').'/wp-content/themes/barcelona/assets/js/bootstrap-lightbox.min.js', array(), '20170205', true );
    }
    function add_script() {
        register_script();
            wp_enqueue_script('jquery');
            wp_enqueue_script('widgets_js');
            wp_enqueue_script('grid');
            wp_enqueue_script('customize');
            // wp_enqueue_script('bootstrap_lightbox');
    }
    add_action('wp_enqueue_scripts', 'add_script');
// CSS インクルード 一元管理
function register_style() {
    wp_register_style('icomoon', get_bloginfo('template_directory').'/icomoon/style.css');
    // wp_register_style('bootstrap-lightbox', get_bloginfo('template_directory').'/assets/css/bootstrap-lightbox.min.css');
}
    function add_stylesheet() {
        register_style();
            wp_enqueue_style('icomoon');
            // wp_enqueue_style('bootstrap-lightbox');
    }
add_action('wp_enqueue_scripts', 'add_stylesheet');
?>
<?php
// jsインクルード
add_action('wp_footer', 'my_load_scripts');
function my_load_scripts() { ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8&appId=981754635303135";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>
<?php
// jsインクルード
add_action('wp_footer', 'my_load_scripts2');
function my_load_scripts2() { ?>
        <script>
        window.onload = function() {
            jQuery(function($) {
                $('.masonry').masonry({
                    itemSelector: '.box',
                    columnWidth: 1,
                    gutter: 1,
                    isFitWidth: true //親要素の幅に合わせてカラム数を自動調整
                });
            });
        }
          $(window).resize(function(){
            $('.masonry').masonry({itemSelector : '.box', isFitWidth: true});
          });
        </script>
        <script type="text/javascript">
        $(".boxer").boxer();
        </script>
<?php } ?>
<?php
// GoogleアナリティクストラッキングIDをインクルード
add_action('wp_footer', 'ga');
function ga() { ?>
  <script type='text/javascript'>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-58709942-5', 'auto');
    ga('send', 'pageview');
  </script>
<?php } ?>
<?php
// シェアボタン
function SNS_btn_horizontal_bottom()
{ ?>
<?php
$canonical_url=get_permalink();
$title=wp_title( '', false, 'right' ).'| '.get_bloginfo('name');
$canonical_url_encode=urlencode($canonical_url);
$title_encode=urlencode($title);
?>
      <div id="sns-btn-bottom" class="sns-buttons-pc">
        <ul class="snsbv">
          <li class="balloon-btn-horizontal feedly-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fkzdesign.net%2Ffeed%2F" target="blank" class="arrow-box-horizontal-link feedly-arrow-box-horizontal-link" title="Feedlyで最新記事をフォロー！">
                  <?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'0':scc_get_follow_feedly(); ?>
                </a>
                <a href="http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fkzdesign.net%2Ffeed%2F" target="blank" class="balloon-btn-horizontal-link feedly-balloon-btn-horizontal-link" title="Feedlyで最新記事をフォロー！">
                  <i class="icon-feedly"></i>
                </a>
              </span>
            </span>
          </li>
          <li class="balloon-btn-horizontal pocket-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="http://getpocket.com/edit?url=<?php echo $canonical_url_encode;?>&title=<?php echo $title_encode;?>" target="blank" class="arrow-box-horizontal-link pocket-arrow-box-horizontal-link" title="Pocketしてあとで読む">
                  <?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'0':scc_get_share_pocket(); ?>
                </a>
                <a href="http://getpocket.com/edit?url=<?php echo $canonical_url_encode;?>&title=<?php echo $title_encode;?>" target="blank" class="balloon-btn-horizontal-link pocket-balloon-btn-horizontal-link" title="Pocketしてあとで読む">
                  <i class="icon-pocket"></i>
                </a>
              </span>
            </span>
          </li>
          <li class="balloon-btn-horizontal googleplus-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="https://plus.google.com/share?url=<?php echo $canonical_url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="blank" class="arrow-box-horizontal-link googleplus-arrow-box-horizontal-link" title="+1する！">
                  <?php if(function_exists('scc_get_share_gplus')) echo (scc_get_share_gplus()==0)?'0':scc_get_share_gplus(); ?>
                </a>
                <a href="https://plus.google.com/share?url=<?php echo $canonical_url_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="blank" class="balloon-btn-horizontal-link googleplus-balloon-btn-horizontal-link" title="+1する！">
                  <i class="icon-googleplus"></i>
                </a>
              </span>
            </span>
          </li>
          <li class="balloon-btn-horizontal hatena-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode ?>&title=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" target="blank" class="arrow-box-horizontal-link hatena-arrow-box-horizontal-link" title="はてブする！">
                  <?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'0':scc_get_share_hatebu(); ?>
                </a>
                <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $canonical_url_encode ?>&title=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510');return false;" target="blank" class="balloon-btn-horizontal-link hatena-balloon-btn-horizontal-link" title="はてブする！">
                  <i class="icon-hatena"></i>
                </a>
              </span>
            </span>
          </li>
          <li class="balloon-btn-horizontal twitter-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" target="blank" class="arrow-box-horizontal-link twitter-arrow-box-horizontal-link" title="ツイートする！">
                  <?php if(function_exists('scc_get_share_twitter')) echo (scc_get_share_twitter()==0)?'0':scc_get_share_twitter(); ?>
                </a>
                <a href="http://twitter.com/intent/tweet?url=<?php echo $canonical_url_encode ?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" target="blank" class="balloon-btn-horizontal-link twitter-balloon-btn-horizontal-link" title="ツイートする！">
                  <i class="icon-twitter"></i>
                </a>
              </span>
            </span>
          </li>
          <li class="balloon-btn-horizontal facebook-balloon-btn-horizontal">
            <span class="balloon-btn-set">
              <span class="arrow-box-horizontal">
                <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="blank" class="arrow-box-horizontal-link facebook-arrow-box-horizontal-link" title="Facebookでシェア！">
                  <?php if(function_exists('scc_get_share_facebook')) echo (scc_get_share_facebook()==0)?'0':scc_get_share_facebook(); ?>
                </a>
                <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $canonical_url_encode;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="blank" class="balloon-btn-horizontal-link facebook-balloon-btn-horizontal-link" title="Facebookでシェア！">
                  <i class="icon-facebook"></i>
                </a>
              </span>
            </span>
          </li>
        </ul>
        <div class="clearfloat"></div>
      </div>
<?php } ?>