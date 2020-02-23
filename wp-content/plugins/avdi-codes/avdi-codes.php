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
/* Stop Adding Functions Below this Line */
?>
