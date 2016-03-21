<?php
/**
 * Football8x8 back compat functionality
 *
 * Prevents Football8x8 from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Football8x8 1.0
 */

/**
 * Prevent switching to Football8x8 on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Football8x8 1.0
 */
function football8x8_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'football8x8_upgrade_notice' );
}
add_action( 'after_switch_theme', 'football8x8_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Football8x8 on WordPress versions prior to 4.1.
 *
 * @since Football8x8 1.0
 */
function football8x8_upgrade_notice() {
	$message = sprintf( __( 'Football8x8 requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'football8x8' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Football8x8 1.0
 */
function football8x8_customize() {
	wp_die( sprintf( __( 'Football8x8 requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'football8x8' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'football8x8_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Football8x8 1.0
 */
function football8x8_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Football8x8 requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'football8x8' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'football8x8_preview' );
