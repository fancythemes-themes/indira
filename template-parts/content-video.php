<?php
/**
 * The template part for displaying content
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><span class="screen-reader-text"><?php esc_html_e( 'Sticky', 'indira' ); ?></span><?php echo indira_svg_icon('pin'); ?></span>
		<?php endif; ?>

		<div class="entry-cats">
			<?php indira_entry_categories(); ?>
		</div>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php
			indira_entry_author();
			indira_entry_date();
			indira_entry_edit_link();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php //indira_excerpt(); ?>

	<?php //indira_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				'%1$s<span class="screen-reader-text"> "%2$s"</span>',
				esc_html__('Continue reading', 'indira'),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'indira' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'indira' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php
		if ( function_exists( 'sharing_display' ) ) {
			sharing_display( '', true );
		}
		?>

		<div class="entry-meta">
			<?php 
			indira_entry_tags();
			indira_entry_comments();
			?>
		</div>

		<?php
		if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
			echo do_shortcode( '[jetpack-related-posts]' );
		}		
		?>
	</footer>

</article><!-- #post-## -->
