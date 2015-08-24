<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fortunato
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) {
				the_posts_navigation();
			} else {
				the_posts_pagination( array(
					'prev_text'          => __( '<i class="fa fa-angle-double-left spaceRight"></i>Previous', 'fortunato' ),
					'next_text'          => __( 'Next<i class="fa fa-angle-double-right spaceLeft"></i>', 'fortunato' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fortunato' ) . ' </span>',
				) );
			} ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
