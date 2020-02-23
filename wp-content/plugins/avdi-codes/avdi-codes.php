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

global $wp;
global $wp_query;
global $pagename;

function say_no($before) {
  // now can I figure out which page this is? I don't know!!
  // it might be like $wp->request or like $wp_query->post or any number of things
  // but I don't know how to even explore that. Or to log, or to get any output from here to anywhere.
   $thispage=$_SERVER["REQUEST_URI"]; //print_r($wp_query);// add_query_arg(array(),$wp->request); //$wp_query->post->post_title;
  
  if (preg_match('/^\/[(blog)(contact)]/', $thispage)) {
    function add_jess_header($whatevs) {
      $thispage=$_SERVER["REQUEST_URI"];
      header('X-Jess: yeah [' . $thispage . '] looks static to me. Not starting a session ');
    }
    add_action('send_headers', 'add_jess_header');
    return false;
  }   

  return $before;

}
add_filter('edd_start_session', 'say_no');

/* Stop Adding Functions Below this Line */
?>
