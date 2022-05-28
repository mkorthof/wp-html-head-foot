<?php
/*
 *  Source: https://stackoverflow.com/questions/19846464
 *  Plugin Name: HTML In Header-Footer
 *  Description: Embed HTML in Header or Footer of Page. Uses the Plugin Editor to make changes.
 *  Version: 1.0
 *
 *  DO NOT FORGET TO ACTIVATE THE PLUGIN AFTER EDITING :) 
 *
 */

// CONFIGURATION:
// --------------

// Define Header HTML here
// EXAMPLE: echo '<html><!-- html to insert goes here --><br></html>' . "\n";

function insert_head() {
    echo '<!-- html to insert goes here -->';
}

// Same for Footer

function insert_footer() {
    echo '<!-- html to insert goes here -->';
}

// Comment add_action to enable and/or disable Header and/or Footer

if ( ! defined( 'REST_REQUEST' ) ) {
  //add_action('wp_head', 'insert_head', '1');
  add_action('wp_footer', 'insert_footer', '1');
}

// END OF CONFIGURATION
// --------------------

function plugin_add_action_links( $links ) {
    $settings_link = '<a href="'.admin_url() . '?edit-hihf' . '">'. __( 'Deactivate and Edit' ) .'</a>';
    array_unshift($links, $settings_link);
    return $links;
}
function hihf_init_action() {
    if ( isset($_GET['edit-hihf']) ) {
          $plugin = plugin_basename( __FILE__ );
          deactivate_plugins( $plugin ); 
          wp_redirect( admin_url('plugin-editor.php?plugin='.$plugin.'&Submit=Select') );
          exit;
    }
    return;
}
add_filter( "plugin_action_links_" . plugin_basename( __FILE__ ), 'plugin_add_action_links' );
add_action( 'init', 'hihf_init_action' );
?>
