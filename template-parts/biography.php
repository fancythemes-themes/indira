<?php
/**
 * The template part for displaying an Author biography
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */
?>

<div class="author-info">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the Indira author bio avatar size.
		 *
		 * @since Indira 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'indira_author_bio_avatar_size', 80 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<div class="author-title entry-meta"><span class="author-heading"><?php esc_html_e( 'Written by', 'indira' ); ?></span> <?php echo get_the_author(); ?></div>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
		<p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php 
				/* translators: %s: post author name */
				printf( esc_html__( 'View all posts by %s', 'indira' ), get_the_author() ); 
				?>
			</a>
		</p><!-- .author-bio -->
	</div><!-- .author-description -->
</div><!-- .author-info -->
