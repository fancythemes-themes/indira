<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */
?>

<article class="no-results not-found">
	<header class="page-header-no-result">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'indira' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf( '%1$s<a href="%2$s">%3$s</a>.', 
					esc_html__( 'Ready to publish your first post?', 'indira') ,
					esc_url( admin_url( 'post-new.php' ) ),
					esc_html_x( 'Get started here', 'anchor text for link to create post', 'indira' )
				); 
			?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'indira' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'indira' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</article><!-- .no-results -->
