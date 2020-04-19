<?php
/*
Plugin Name: Site Plugin for avdi.codes
Description: Site specific code changes for avdi.codes
*/
/* Start Adding Functions Below this Line */
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
} 

/*
 * Only start an EDD session if necessary.
 * 
 * This avoids busting the cache for every page on the site.
 * 
 * Originally provided by Daniel Goldak at EDD support.
 * Ref: https://app.frontapp.com/open/msg_a23om0z
 *
 * @param  bool $start_session
 * @return bool
 */
function eddwp_maybe_start_session( $start_session ) {
	if ( '/' == $_SERVER['REQUEST_URI'] ) {
		$start_session = false;
	}
	if( false !== strpos( $_SERVER['REQUEST_URI'], '/downloads' ) && '/downloads/' === trailingslashit( $_SERVER['REQUEST_URI'] ) ) {
		$start_session = false;
	}
	if( empty( $_REQUEST['edd_action'] ) && false === strpos( $_SERVER['REQUEST_URI'], '/downloads' ) ) {
		$start_session = false;
	}
	// if we're in checkout we should have a session
	if ( false !== strpos( trailingslashit($_SERVER['REQUEST_URI']), '/checkout/') ) {
		$start_session = true;
	}
	// Finally, if there is a discount in the GET parameters, we should always start a session, so it applies correctly.
	if ( ! empty( $_GET['discount'] ) ) {
		$start_session = true;
	}
	return $start_session;
}
add_filter( 'edd_start_session', 'eddwp_maybe_start_session', 10, 1 );

/* Stop Adding Functions Below this Line */
?>