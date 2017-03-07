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
    .main-bg { background-color: #405072 !important; }
    .post-content p { color: #EBF8F2 !important; }
    .post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 { color: #EBF8F2 !important; font-weight: 900 !important; border-bottom: 1px solid rgb(176, 9, 9); }
</style>
<div class="<?php echo esc_attr( barcelona_single_class() ); ?> radius shadow main-bg">

	<div id="fix-c" class="<?php echo esc_attr( barcelona_row_class() ); ?>">

		<main id="main" class="<?php echo esc_attr( barcelona_main_class() ); ?>">

			<?php if ( have_posts() ): while( have_posts() ): the_post(); ?>

				<article id="post-<?php echo intval( get_the_ID() ); ?>" <?php post_class(); ?>>

					<?php barcelona_featured_img(); ?>

					<?php if ( barcelona_get_option( 'show_content' ) == 'on' ): ?>
					<section class="post-content">
					<?php

						the_content();

						if ( ! $barcelona_is_pw_req ) {

							wp_link_pages( array(
								'before'   => '<div class="pagination"><span class="page-numbers title">' . esc_html__( 'Pages:', 'barcelona' ) . '</span>',
								'after'    => '</div>',
								'pagelink' => '%'
							) );

						}

					?>
					</section><!-- .post-content -->
					<?php endif; ?>

					<?php if ( ! $barcelona_is_pw_req ): ?>
					<footer class="post-footer">

						<?php if ( barcelona_get_option( 'show_tags' ) == 'on' && $barcelona_post_tags = get_the_tags() ): ?>
						<div class="post-tags">
							<?php the_tags( '<strong class="title">'. esc_html__( 'Tags:', 'barcelona' ) .'</strong> ' ); ?>
						</div><!-- .post-tags -->
						<?php endif; ?>


						<?php

						barcelona_post_voting();

						barcelona_social_sharing();

						barcelona_author_box();

						barcelona_pagination( 'nextprev' );

						barcelona_post_ad();

						comments_template();

						?>

					</footer><!-- .post-footer -->
					<?php endif; ?>

				</article>

			<?php endwhile; endif; ?>

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