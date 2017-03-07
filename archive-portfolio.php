<?php

$barcelona_mod_header = '<div class="box-header archive-header has-title"><h2 class="title main-bg">'. get_the_archive_title() .'</h2></div>';

get_header();

barcelona_breadcrumb();

?>


<div class="breadcrumb-wrapper"><div class="container shadow main-bg">
<div class="breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
<?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
</div>
</div></div>


<?php

if ( is_category() ) {

	$barcelona_cat = get_queried_object();

	if ( barcelona_get_option( 'show_cat_title' ) == 'off' ) {
		unset( $barcelona_mod_header );
	}

	if ( ! empty( $barcelona_cat->description ) ) {

		if ( ! isset( $barcelona_mod_header ) ) {
			$barcelona_mod_header = '';
		}

		$barcelona_mod_header .= '<div class="box-description post-content">'. apply_filters( 'the_content', $barcelona_cat->description ) .'</div>';

	}

}

if ( barcelona_featured_posts() && isset( $barcelona_mod_header ) ) {
	unset( $barcelona_mod_header );
}

?>
<style type="text/css">
    .main-bg { background-color: #44842E !important; }
    .post-content p { color: #EBF8F2 !important; text-shadow: initial !important; }
    .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 { font-weight: 900 !important; border-bottom: 1px solid rgb(176, 9, 9); }
    h2.post-title a  { color: #EBF8F2 !important; }
    .post-summary .post-excerpt { color: #EBF8F2 !important; }
    .post-summary .post-meta { color: #EBF8F2 !important; }
</style>
<div class="container radius shadow main-bg">

	<div id="fix-c" class="<?php echo esc_attr( barcelona_row_class() ); ?>">

		<main id="main" class="<?php echo esc_attr( barcelona_main_class() ); ?>">
		<?php

			if ( is_author() && barcelona_get_option( 'show_author_box' ) == 'on' ) {
				barcelona_author_box();
			}

			$barcelona_mod_post_meta = barcelona_get_option( 'post_meta_choices' );

			include( locate_template( 'includes/modules/module-'. barcelona_get_option( 'posts_layout' ) .'.php' ) );

			barcelona_pagination( barcelona_get_option( 'pagination' ) );

		?>
		</main>

    <aside id="sidebar" class="<?php echo esc_attr( barcelona_sidebar_class() ); ?>">

      <div class="sidebar-inner">

        <?php dynamic_sidebar( 'index Sidebar' ); ?>

      </div><!-- .sidebar-inner -->

    </aside>

	</div><!-- .row -->

</div><!-- .container -->
<?php

get_footer();