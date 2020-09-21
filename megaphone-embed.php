<?php
/**
 * Plugin Name: megaphone.fm embed
 * Description: This plugin allows you to easily add Megaphone.fm embeddable player to the site by simply copying their URL and pasting it into your content.
 * Version: 2020.9.21
 * Author: Kenda Levänen
 * Author URI: https://kenda.fi/
 * Text Domain: megaphone-fm-embed-by-kenda
 * Domain Path: /languages
 *
 * This can handle links like https://player.megaphone.fm/DEM1119155060
 *
 * This plugin has no settings page.
 *
 */

function wp_embed_handler_megaphone( $matches, $attr, $url, $rawattr ) {

  $embed = sprintf(
    '<iframe frameborder="no" height="455" scrolling="no" src="https://player.megaphone.fm/%1$s?tile=true" width="275"></iframe>',
    esc_attr( $matches[1] )
  );

  return apply_filters( 'embed_megaphone', $embed, $matches, $attr, $url, $rawattr );

}

add_action( 'init', function() {

  wp_embed_register_handler(
    'megaphone-embed',
    '#https://player\.megaphone\.fm/([A-Za-z0-9]+)/?#i',
    'wp_embed_handler_megaphone'
  );

} );

?>