<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */

get_header(); ?>

	<?php indira_breadcrumbs(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<article class="error-404 not-found">
				<header class="page-header-not-found">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'indira' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'indira' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</article><!-- .error-404 -->

		</main><!-- .site-main -->

		<?php get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>