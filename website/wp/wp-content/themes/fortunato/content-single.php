<?php
/**
 * @package fortunato
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php fortunato_single_category(); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="sepHentry"><div class="entry-meta smallPart">
			<?php fortunato_posted_on(); ?>
		</div></div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'fortunato' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-links-number">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'fortunato' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php fortunato_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
