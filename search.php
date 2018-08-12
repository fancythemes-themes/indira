<?php
/**
 * The template for displaying search results pages
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */

get_header(); ?>

	<?php indira_breadcrumbs(); ?>

	<?php $list_class = get_theme_mod( 'search_blog_list_view', 'list') . '-view'; ?>
	<section id="primary" class="content-area <?php echo esc_attr($list_class); ?>">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: keyword for search */
					printf( esc_html__( 'Search Results for: %s', 'indira' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				if ( 'classic' == get_theme_mod( 'archive_blog_list_view', 'list') )
					get_template_part( 'template-parts/content', get_post_format() );
				else
					get_template_part( 'template-parts/content-list', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => esc_html__( 'Previous page', 'indira' ),
				'next_text'          => esc_html__( 'Next page', 'indira' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'indira' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
