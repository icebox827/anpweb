<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_shortcode('FHS', 'fh_shortcode');
function fh_shortcode($post_id) {
	ob_start();
	$fhs_id = $post_id['id'];
	wp_enqueue_style('fh-barrager-css', FH_PLUGIN_URL . 'css/barrager/barrager.css');
	wp_enqueue_style('awl-font-awesome-css', FH_PLUGIN_URL . 'css/font-awesome.css');

	wp_enqueue_script('fh-barrager-js', FH_PLUGIN_URL .'js/barrager/jquery.barrager.js');	// before body load

	//load settings
	$fh_settings = unserialize(base64_decode(get_post_meta( $fhs_id, 'awl_fh_settings_'.$fhs_id, true)));
	if(isset($fh_settings['fh_img'])) $fh_img = $fh_settings['fh_img']; else $fh_img = FH_PLUGIN_URL."img/img-1.png";
	if(isset($fh_settings['fh_headline_text'])) $fh_headline_text = $fh_settings['fh_headline_text']; else $fh_headline_text = 'This is sample headline text you can change this at any time.';
	if(isset($fh_settings['fh_headline_width'])) $fh_headline_width = $fh_settings['fh_headline_width']; else $fh_headline_width = 440;
	if(isset($fh_settings['fh_img_url'])) $fh_img_url = $fh_settings['fh_img_url']; else $fh_img_url = '';
	if(isset($fh_settings['fh_font_size'])) $fh_font_size = $fh_settings['fh_font_size']; else $fh_font_size = 16;
	if(isset($fh_settings['fh_text_bg_color'])) $fh_text_bg_color = $fh_settings['fh_text_bg_color']; else $fh_text_bg_color = "#1395ba";
	if(isset($fh_settings['fh_headline_text_color'])) $fh_headline_text_color = $fh_settings['fh_headline_text_color']; else $fh_headline_text_color = "#FFFFFF";
	if(isset($fh_settings['fh_link'])) $fh_link = $fh_settings['fh_link']; else $fh_link = "http://awplife.com";
	if(isset($fh_settings['fh_close_btn'])) $fh_close_btn = $fh_settings['fh_close_btn']; else $fh_close_btn = "true";
	if(isset($fh_settings['fh_speed'])) $fh_speed = $fh_settings['fh_speed']; else $fh_speed = 5;
	if(isset($fh_settings['fh_repeat'])) $fh_repeat = $fh_settings['fh_repeat']; else $fh_repeat = 'yes';

	require('floating-headline-output.php');
	return ob_get_clean();
}
?>