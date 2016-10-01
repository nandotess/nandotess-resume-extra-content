<?php
/**
 * Uninstall
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option( 'nandotess-resume-extra-content-version' );
