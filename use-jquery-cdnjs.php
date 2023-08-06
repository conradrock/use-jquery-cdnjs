<?php
 /*
Plugin Name: Use jQuery CDNjs
Plugin URI: https://cannabytes.net/use-jquery-cdnjs
Donate link: conrad@cannabytes.net
Description: Change your WordPress Installation to use CloudFlare CDNjs to serve jQuery
Author: Conrad Rockenhaus (conradrock)
Author URI: https://cannabytes.net
Version: 1.0
*/
function modify_jquery() {global $wp_scripts;
	if (!is_admin()) {
		$jquery_ver = $wp_scripts->registered['jquery']->ver;
		$jquery_migrate_ver = $wp_scripts->registered['jquery-migrate']->ver;
		wp_deregister_script('jquery');
		wp_deregister_script('jquery-migrate');
		wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/'.$jquery_ver.'/jquery.min.js', false, null,true);
		wp_enqueue_script('jquery-migrate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/'.$jquery_migrate_ver.'/jquery-migrate.min.js', false, null,true);
		}
}
add_action('wp_enqueue_scripts', 'modify_jquery',9999);
?>
