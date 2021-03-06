<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * 
 * @package Indira
 * @since Indira 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer">

			<?php get_sidebar('footer'); ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'indira' ); ?>">
					<?php
						add_filter( 'walker_nav_menu_start_el', 'indira_social_menu_item_output', 10, 4 );
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => indira_svg_icon('icon_replace') . '<span class="social-link screen-reader-text">',
							'link_after'     => '</span>',
						) );
						remove_filter( 'walker_nav_menu_start_el', 'indira_social_menu_item_output' );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>
			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'indira' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'menu_class'     => 'footer-menu',
							'depth'			 => 1,
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
			<div class="site-info">
				<?php
					/**
					 * Fires before the indira footer text for footer customization.
					 *
					 * @since Indira 1.0
					 */
					do_action( 'indira_credits' );
					indira_footer_credit(true);
				?>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
