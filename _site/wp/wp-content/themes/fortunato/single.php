<?php
/**
 * The template for displaying all single posts.
 *
 * @package fortunato
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			
			<?php
				the_post_navigation( array(
					'next_text' => '<div class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'fortunato' ) . '</div> <i class="fa fa-lg fa-angle-right"></i>' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'fortunato' ) . '</span> ' .
						'<span class="smallPart">%title</span>',
					'prev_text' => '<i class="fa fa-lg fa-angle-left"></i><div class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'fortunato' ) . '</div> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'fortunato' ) . '</span> ' .
						'<span class="smallPart">%title</span>',
				) );
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
