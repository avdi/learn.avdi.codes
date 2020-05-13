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
	// If this is an AJAX POST from applying a discount code
	if ( 'edd_apply_discount' == $_POST['action'] ) {
		$start_session = true;
	}
	// error_log(print_r($_POST['code'], true));
	// error_log(print_r($_POST['action'], true));
	// error_log(print_r($_POST['form'], true));
	// if($start_session) {
	// 	error_log("*** EDD start session: YES");
	// } else {
	// 	error_log("*** EDD start session: NO");
	// }
	return $start_session;
}
add_filter( 'edd_start_session', 'eddwp_maybe_start_session', 10, 1 );

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function avdicodes_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for admins
        if ( in_array( 'administrator', $user->roles ) ) {
            // redirect them to the default place
            return $redirect_to;
        } else {
            return get_bloginfo( 'url' ) . '/account-home/';
        }
    } else {
        return $redirect_to;
    }
}
 
add_filter( 'login_redirect', 'avdicodes_login_redirect', 10, 3 );

/* Stop Adding Functions Below this Line */	