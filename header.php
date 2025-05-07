<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Swiper CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<!-- Swiper JS -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<header id="wrapper-navbar">

		<a class="skip-link <?php echo understrap_get_screen_reader_class( true ); ?>" href="#content">
			<?php esc_html_e( 'Skip to content', 'understrap' ); ?>
		</a>
		<div id="top-navbar" class="bg-secondary text-white py-3 text-center text-md-end">
			<div class="container">
			<?php if(get_field('phone','options')){ echo 'Tel: <a href="tel:'. get_field('phone','options') .'">+'. get_field('phone','options') . '</a>'; } ?>
			<?php if(get_field('email','options')){ echo '<span class="divider"> | </span><a href="mailto:'. get_field('email','options') .'">'. get_field('email','options') . '</a>'; } ?>
			<span class="divider"> | </span><ul class="top-navbar_socials">
				<?php if(get_field('facebook','options')){ echo '<li><a href="'. get_field('facebook','options') .'" target="_blank"><i class="icon-facebook"></i></a></li>'; } ?>
				<?php if(get_field('instagram','options')){ echo '<li><a href="'. get_field('instagram','options') .'" target="_blank"><i class="icon-instagram"></i></a></li>'; } ?>
				<?php if(get_field('linkedin','options')){ echo '<li><a href="'. get_field('linkedin','options') .'" target="_blank"><i class="icon-linkedin"></i></a></li>'; } ?>
			</ul>
			<span class="divider"> | </span><a href="/enquiry/">Wholesale enquiry</a>
			</div>
		</div>
		<?php get_template_part( 'global-templates/navbar', 'offcanvas' ); ?>

	</header><!-- #wrapper-navbar -->
