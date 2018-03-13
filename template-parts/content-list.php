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
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<span class="sticky-post"><span class="screen-reader-text"><?php esc_html_e( 'Sticky', 'indira' ); ?></span><?php echo indira_svg_icon('pin'); ?></span>
	<?php endif; ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail('large'); ?></a>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php esc_html_e( 'Featured', 'indira' ); ?></span>
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

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
