<?php
/**
 * Echo Theme functions and definitions
 *
 * @package EchoTheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$echo_theme_inc_dir = 'inc';

// Array of files to include.
$echo_theme_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/cpt.php',                             // Register custom post types.
	'/wp-overrides.php',                    // Override default Wordpress functions & settings
	'/plugin-overrides.php',                // Override plugin functions & settings
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/shortcodes.php',                      // Library of shortcodes
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$echo_theme_includes[] = '/wc-overrides.php'; // Override default WooCommerce functions & settings
	$echo_theme_includes[] = '/woocommerce.php'; // WooCommerce functions
}

// Include files.
foreach ( $echo_theme_includes as $file ) {
	require_once get_theme_file_path( $echo_theme_inc_dir . $file );
}


add_filter('wpcf7_before_send_mail', 'set_dynamic_recipients_from_checkbox');

function set_dynamic_recipients_from_checkbox($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if (!$submission) return $contact_form;

    $data = $submission->get_posted_data();
    
    // Adjust field name if needed
    $selected = isset($data['Interested']) ? $data['Interested'] : [];

    if (!is_array($selected)) {
        $selected = [$selected];
    }

    // Map checkbox labels to emails
    $recipients_map = array(
        'Memorials'   => 'clare@barhamstone.com',
        'Interiors' => 'peter@barhamstone.com',
        'Fireplaces/Hearths' => 'info@barhamstone.com',
        'Wholesale' => 'info@barhamstone.com',
    );

    // Collect matching emails
    $emails = array();
    foreach ($selected as $item) {
        if (isset($recipients_map[$item])) {
            $emails[] = $recipients_map[$item];
        }
    }

    if (!empty($emails)) {
        $mail = $contact_form->prop('mail');
        $mail['recipient'] = implode(',', $emails); // comma-separated list
        $contact_form->set_properties(array('mail' => $mail));
    }

    return $contact_form;
}


