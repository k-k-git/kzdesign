<?php

$barcelona_is_pw_req = post_password_required();

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

barcelona_featured_img();

?>
<style type="text/css">
    .main-bg { background-color: #D00027 !important; }
     main#main { background: url(wp-content/themes/barcelona/img/main-img/content-img.png) fixed no-repeat center; }
    .post-content p {}
    .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 { color: #EBF8F2 !important; font-weight: 900 !important; border-bottom: 1px solid rgb(176, 9, 9); }
</style>
<div class="<?php echo esc_attr( barcelona_single_class() ); ?> radius shadow main-bg">

	<div id="fix-c" class="row-primary sidebar-none clearfix">

		<main id="main" class="<?php echo esc_attr( barcelona_main_class() ); ?>">

			<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

				<article id="post-<?php echo intval( get_the_ID() ); ?>" <?php post_class(); ?> role="article">

					<?php barcelona_featured_img(); ?>

					<?php if ( barcelona_get_option( 'show_content' ) == 'on' ): ?>
					<section class="post-content">
					<?php

						the_content();

						if ( ! $barcelona_is_pw_req && ! barcelona_is_woocommerce() ) {

							wp_link_pages( array(
								'before'   => '<div class="pagination"><span class="page-numbers title">' . esc_html__( 'Pages:', 'barcelona' ) . '</span>',
								'after'    => '</div>',
								'pagelink' => '%'
							) );

						}

					?>
					</section><!-- .post-content -->
					<?php endif; ?>

					<?php if ( ! $barcelona_is_pw_req && ! barcelona_is_woocommerce() ): ?>
					<footer class="post-footer">

						<?php

						barcelona_post_voting();

						barcelona_social_sharing();

						barcelona_author_box();

						barcelona_post_ad();

						comments_template();

						?>

					</footer><!-- .post-footer -->
					<?php endif; ?>

				</article>

			<?php endwhile; endif; ?>

		</main>


	</div><!-- .row -->

</div><!-- .container -->
<?php

get_footer();