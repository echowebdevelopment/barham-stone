<?php
/**
 * Sidebar setup for footer full
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'echo_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-footer-full" role="complementary">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 ">

				<div class="col p-3>
					<?php get_template_part( 'global-templates/navbar-branding' ); ?>
				</div>
				<div class="col p-3">
					<h3 class="widget-title">Menu</h3>
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
							)
						);
					?>
				</div>
				<div class="col p-3">
					<?php echo do_shortcode('[footer-nap]'); ?>
				</div>
				<div class="col p-3">
					<?php echo do_shortcode('[social-icons]'); ?>
					<a href="https://namm.org.uk/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/css/icons/Namm.png'; ?>" class="namm-logo"></a>
				</div>
				<div class="col p-3">
					<h3 class="widget-title">Please call to arrange appointment before visiting</h3>
					<?php the_field('opening_hours','options') ?>
					<!--
					<a href="/enquiry/" class="btn">make an enquiry</a>
					<a href="/enquiry/" class="link-text">GO TO WHOLESALE ENQUIRY</a>
					-->
				</div>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
