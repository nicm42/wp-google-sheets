<?php
/*
Plugin Name:  Google Sheets Data
Description:  Getting Google Sheets data
Version:      1.0
Author:       nicm42
Author URI:   https://www.nicm42.co.uk
*/

/*
Code from https://www.milessebesta.com/web-design/how-to-publish-google-sheets-data-to-a-wordpress-site/?cn-reloaded=1
How to use shortcodes from https://www.wp-tweaks.com/display-a-single-cell-from-google-sheets-wordpress/
*/

function get_google_sheet_data($atts) {
  $query = $atts['range'];
  $direction = strtoupper($atts['type']);
  $data = false;
  $key = 'API_KEY_GOES_HERE';
  $sheet = 'SHEET_ID_GOES_HERE';
  $response = wp_remote_get("https://sheets.googleapis.com/v4/spreadsheets/$sheet/values/$query?majorDimension=$direction&key=$key");

  if (!wp_cache_get($query)) {
    if (!is_wp_error($response)) {
      $response = json_decode(wp_remote_retrieve_body($response), true);
      if (isset($response['values'])) {
        $data = $response['values'];
        wp_cache_add($query, $data);
      }
    }
  } else {
    $data =  wp_get_cache($query);
  }

  wp_enqueue_script( 'google-sheets-data', plugin_dir_url(__FILE__) . 'google-sheets-data.js' );
  # Send data to JavaScript
  wp_add_inline_script( 'google-sheets-data', 'var params = ' . wp_json_encode( $data ), 'before' );
  wp_enqueue_style( 'google-sheets-data', plugin_dir_url(__FILE__) . 'google-sheets-data.css' );
}

add_shortcode('get_sheet_data', 'get_google_sheet_data');

# Shortcode example: [get_sheet_data range="Sheet1!A:B" type="columns"]

?>