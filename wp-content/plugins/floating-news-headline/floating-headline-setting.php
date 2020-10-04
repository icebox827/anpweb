<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//js		
wp_enqueue_script('jquery','jquery-ui-core');
wp_enqueue_script( 'awl-bootstrap-js',  FH_PLUGIN_URL .'js/bootstrap.js', array( 'jquery' ), '', true  );
wp_enqueue_script('fh-iconset-all-min-js', FH_PLUGIN_URL .'js/iconset-all.min.js', array( 'jquery' ), '', true );
wp_enqueue_script('fh-icon-picker-js', FH_PLUGIN_URL .'js/bootstrap-iconpicker.js', array( 'jquery' ), '', true );

//toggle button CSS
wp_enqueue_style( 'awl-bootstrap-css', FH_PLUGIN_URL .'css/bootstrap.css' );
wp_enqueue_style('awl-styles-css', FH_PLUGIN_URL . 'css/styles.css');
wp_enqueue_style('awl-toogle-button-css', FH_PLUGIN_URL . 'css/toogle-button.css');
wp_enqueue_style('awl-font-awesome-css', FH_PLUGIN_URL . 'css/font-awesome.css');
wp_enqueue_style('fh-bootstrap-iconpicker-css', FH_PLUGIN_URL . 'css/bootstrap-iconpicker.min.css');			

//load settings
$fh_settings = unserialize(base64_decode(get_post_meta( $post->ID, 'awl_fh_settings_'.$post->ID, true)));

?>
<style>
.gg_settings {
	padding: 8px 0px 8px 8px !important;
	margin: 10px 10px 4px 10px !important;
}
.gg_settings label {
	font-size: 16px !important;
	font-weight: bold;
}

.gg_comment_settings {
	font-size: 15px !important;
	padding-left: 4px;
	font: initial;
	margin-top: 5px;
}
.mar_sli{
	margin-left: 10px;
}
</style>
<h1 class="text-center" style="margin-bottom:1%;"><?php _e('Floating Headline Settings', FHP_TXTDM); ?></h1>
		
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Headline Text', FHP_TXTDM); ?></p>
			<div class="col-md-12">
				<?php if(isset($fh_settings['fh_headline_text'])) $fh_headline_text = $fh_settings['fh_headline_text']; else $fh_headline_text = 'This is sample headline text you can change this at any time.'; ?>
				<textarea name="fh_headline_text" id="fh_headline_text" style="width: 100%"><?php echo $fh_headline_text; ?></textarea>
				<p class="gg_comment_settings"><?php _e('Set headline text here.', FHP_TXTDM); ?></p>
			</div>
		</div>
		
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Headline Width', FHP_TXTDM); ?></p>
			<div class="range-slider ">
				<?php if(isset($fh_settings['fh_headline_width'])) $fh_headline_width = $fh_settings['fh_headline_width']; else $fh_headline_width = 440; ?>
				<input id="fh_headline_width" name="fh_headline_width" class="range-slider__range" type="range" value="<?php echo $fh_headline_width; ?>" min="100" max="2500" step="10" style="width: 300px !important; margin-left: 10px;">
				<span class="range-slider__value"><?php echo $fh_headline_width; ?></span>
				<p class="gg_comment_settings mar_sli"><?php _e('Set headline text width.', FHP_TXTDM); ?></p>
			</div> 
		</div>
		
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Style', FHP_TXTDM); ?></p>
			<div class="col-md-3">
				<p class="gg_comment_settings"><?php _e('Headline Text Size', FHP_TXTDM); ?></p>
				<?php if(isset($fh_settings['fh_font_size'])) $fh_font_size = $fh_settings['fh_font_size']; else $fh_font_size = 16; ?>
				<select id="fh_font_size" name="fh_font_size" class="" style="width: 300px;">
				<option value="12" <?php if($fh_font_size == 12) echo "selected=selected"; ?>><?php _e('&nbsp; 12px', FHP_TXTDM); ?></option>
				<option value="14" <?php if($fh_font_size == 14) echo "selected=selected"; ?>><?php _e('&nbsp; 14px', FHP_TXTDM); ?></option>
				<option value="16" <?php if($fh_font_size == 16) echo "selected=selected"; ?>><?php _e('&nbsp; 16px', FHP_TXTDM); ?></option>
				<option value="18" <?php if($fh_font_size == 18) echo "selected=selected"; ?>><?php _e('&nbsp; 18px', FHP_TXTDM); ?></option>
				<option value="20" <?php if($fh_font_size == 20) echo "selected=selected"; ?>><?php _e('&nbsp; 20px', FHP_TXTDM); ?></option>
				<option value="22" <?php if($fh_font_size == 22) echo "selected=selected"; ?>><?php _e('&nbsp; 22px', FHP_TXTDM); ?></option>
				<option value="24" <?php if($fh_font_size == 24) echo "selected=selected"; ?>><?php _e('&nbsp; 24px', FHP_TXTDM); ?></option>
				</select>
				<p class="gg_comment_settings"><?php _e('Set the font size of the text.', FHP_TXTDM); ?></p>
			</div>
			<div class="col-md-3">
				<p class="gg_comment_settings"><?php _e('Headline Text Background Color', FHP_TXTDM); ?></p>
				<?php if(isset($fh_settings['fh_text_bg_color'])) $fh_text_bg_color = $fh_settings['fh_text_bg_color']; else $fh_text_bg_color = "#1395ba"; ?>
				<input type="text" class="form-control" id="fh_text_bg_color" name="fh_text_bg_color" placeholder="choose form color" value="<?php echo $fh_text_bg_color; ?>" default-color="<?php echo $fh_text_bg_color; ?>">
				<p class="gg_comment_settings"><?php _e('You can change color of text background.', FHP_TXTDM); ?></p>
			</div>
			
			 <div class="col-md-3">
				<p class="gg_comment_settings"><?php _e('Headline Text Color', FHP_TXTDM); ?></p>
				<?php if(isset($fh_settings['fh_headline_text_color'])) $fh_headline_text_color = $fh_settings['fh_headline_text_color']; else $fh_headline_text_color = "#FFFFFF"; ?>
				<input type="text" class="form-control" id="fh_headline_text_color" name="fh_headline_text_color" placeholder="chose form color" value="<?php echo $fh_headline_text_color; ?>" default-color="<?php echo $fh_headline_text_color; ?>">
				<p class="gg_comment_settings"><?php _e('You can change color of headline text.', FHP_TXTDM); ?></p>
			</div>
		</div>		
		
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Link', FHP_TXTDM); ?></p>
			<div class="col-md-12">
				<?php if(isset($fh_settings['fh_link'])) $fh_link = $fh_settings['fh_link']; else $fh_link = "http://awplife.com"; ?>
				<input type="text" placeholder="Ex- www.awplife.com" class="form-control" id="fh_link" name="fh_link" value="<?php echo $fh_link; ?>" style="width: 300px;">		
				<p class="gg_comment_settings"><?php _e('Set link on headline/none.', FHP_TXTDM); ?></p>
			</div>
		</div>		
			
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Close Button', FHP_TXTDM); ?></p>
			<?php if(isset($fh_settings['fh_close_btn'])) $fh_close_btn = $fh_settings['fh_close_btn']; else $fh_close_btn = "true"; ?>
				<div class="switch-field em_size_field">
					<input type="radio" name="fh_close_btn" id="fh_close_btn1" value="false" <?php if($fh_close_btn == "false") echo "checked=checked"; ?>>
					<label for="fh_close_btn1"><?php _e('Hide', FHP_TXTDM); ?></label>
					<input type="radio" name="fh_close_btn" id="fh_close_btn2" value="true" <?php if($fh_close_btn == "true") echo "checked=checked"; ?>>
					<label for="fh_close_btn2"><?php _e('Show', FHP_TXTDM); ?></label>
					<br><br>
					<p class="gg_comment_settings"><?php _e('You can hide / show title on headline.', FHP_TXTDM); ?></p>
				</div>
		</div>
		
		<div class="gg_settings gg_border row">
			<p class="range-slider">
			<?php if(isset($fh_settings['fh_speed'])) $fh_speed = $fh_settings['fh_speed']; else $fh_speed = 5; ?>
				<p class="bg-title"><?php _e('Floating-Speed', FHP_TXTDM); ?></p>
				<input id="fh_speed" name="fh_speed" class="range-slider__range" type="range" value="<?php echo $fh_speed; ?>" min="1" max="20" step="1" style="width: 300px !important;">
				<span class="range-slider__value"><?php echo $fh_speed; ?></span>
				<p class="gg_comment_settings"><?php _e('You can set the roatating speed headline.', FHP_TXTDM); ?></p>
			</p> 
		</div>
		<div class="gg_settings gg_border row">
			<p class="bg-title"><?php _e('Repeat', FHP_TXTDM); ?></p>
			<?php if(isset($fh_settings['fh_repeat'])) $fh_repeat = $fh_settings['fh_repeat']; else $fh_repeat = 'yes'; ?>
			<div class="switch-field em_size_field ">
				<input type="radio" name="fh_repeat" id="fh_repeat1" value="yes" <?php if($fh_repeat == "yes") echo "checked=checked"; ?>>
				<label for="fh_repeat1"><?php _e('Yes', FHP_TXTDM); ?></label>
				<input type="radio" name="fh_repeat" id="fh_repeat2" value="no" <?php if($fh_repeat == "no") echo "checked=checked"; ?>>
				<label for="fh_repeat2"><?php _e('No', FHP_TXTDM); ?></label>
				<br><br>
				<p class="gg_comment_settings mar_sli"><?php _e('Set headline repeatation.', FHP_TXTDM); ?></p>
			</div>
		</div>		
		
		
<?php 
	// syntax: wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' );
	wp_nonce_field( 'fh_save_settings', 'fh_save_nonce' );
?>
<script>
//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker to all inputs that have 'color-field' class
			jQuery('#fh_headline_text_color').wpColorPicker();
			jQuery('#fh_text_bg_color').wpColorPicker();	
				
		});
	})( jQuery );
	
	jQuery(document).ajaxComplete(function() {
		jQuery('#fh_font_color,#fh_font_bg_color').wpColorPicker();
	});
	
	
	//range slider
	var rangeSlider = function(){
	  var slider = jQuery('.range-slider'),
		  range = jQuery('.range-slider__range'),
		  value = jQuery('.range-slider__value');
		
	  slider.each(function(){

		value.each(function(){
		  var value = jQuery(this).prev().attr('value');
		  jQuery(this).html(value);
		});

		range.on('input', function(){
		  jQuery(this).next(value).html(this.value);
		});
	  });
	};
	rangeSlider();
	
	// start pulse on page load
	function pulseEff() {
	   jQuery('#shortcode').fadeOut(600).fadeIn(600);
	};
	var Interval;
	Interval = setInterval(pulseEff,1500);

	// stop pulse
	function pulseOff() {
		clearInterval(Interval);
	}
	// start pulse
	function pulseStart() {
		Interval = setInterval(pulseEff,2000);
	}
	// show headline image preview - onchange
	function ShowPreview(img_url) {
		jQuery('#fh_img_preview').attr('src', img_url);
	}
</script>
