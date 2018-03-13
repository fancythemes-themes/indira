<?php
/**
 * The template part for displaying results in search pages
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php indira_post_thumbnail(); ?>

	<?php indira_excerpt(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php 
			indira_entry_author();
			indira_entry_date();
			indira_entry_edit_link();
			?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					'%1$s<span class="screen-reader-text"> "%2$s"</span>',
					esc_html__( 'Edit', 'indira' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-## -->

