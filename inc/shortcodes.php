<?php
/**
 * Wordpress Shortcodes
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Current year shortcode
 *
 * Print out the current year
 */
add_shortcode('current-year', 'current_year_shortcode');
function current_year_shortcode() {
	return date('Y');
}

/**
 * Website by Echo shortcode
 *
 * Credit Echo with creating the website
 */
add_shortcode( 'by-ews', 'by_ews_shortcode' );
function by_ews_shortcode() {
	return '<a class="by-ews" href="https://www.echowebsolutions.co.uk/websites/" target="_blank" rel="noopener">Website by Echo</a>';
}





/*Footer social icons*/
add_shortcode('social-icons', 'social_icons_shortcode');
function social_icons_shortcode() {
	echo '<h3 class="widget-title">Social</h3>';
	echo '<ul class="footer_socials">';
	if(get_field('facebook','options')){ echo '<li><a href="'. get_field('facebook','options') .'" target="_blank"><i class="icon-facebook"></i></a></li>'; }
	if(get_field('instagram','options')){ echo '<li><a href="'. get_field('instagram','options') .'" target="_blank"><i class="icon-instagram"></i></a></li>'; }
	if(get_field('linkedin','options')){ echo '<li><a href="'. get_field('linkedin','options') .'" target="_blank"><i class="icon-linkedin"></i></a></li>'; }
	echo '</ul>';
}

/*Footer NAP*/
add_shortcode('footer-nap', 'footer_nap_shortcode');
function footer_nap_shortcode() {
	echo '<h3 class="widget-title">Contact Us</h3>';
	if(get_field('address','options')){ echo '<a href="'. get_field('map_link','options') .'" target="_blank">'. get_field('address','options') .'</a>'; }
	
	if(get_field('phone','options')){ echo 'Tel: <a href="tel:'. get_field('phone','options') .'">+'. get_field('phone','options') . '</a><br>'; }
	if(get_field('email','options')){ echo 'Email: <a href="mailto:'. get_field('email','options') .'">'. get_field('email','options') . '</a>'; }
}