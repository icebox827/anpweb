<?php
/**
 * Floating Headline Output
 */
$floating_headline = array(  'p' => $fhs_id, 'post_type' => 'floating_headline', 'orderby' => 'ASC');
$loop = new WP_Query( $floating_headline );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<style>
.barrage {
	right: -<?php echo $fh_headline_width*2; ?>px; 
	width: <?php echo $fh_headline_width; ?>px; 
}
#barrage_<?php echo $fhs_id; ?> {
	color: <?php echo $fh_headline_text_color; ?> !important;
	background-color: <?php echo $fh_text_bg_color; ?> !important;
}

.barrage_box .cl {
	font-size: <?php echo $fh_font_size; ?>px !important;
	color: <?php echo $fh_headline_text_color; ?> !important;
	background-color: <?php echo $fh_text_bg_color; ?> !important;
}
div .z .p {
	font-size: <?php echo $fh_font_size; ?>px !important;
	color: <?php echo $fh_headline_text_color; ?> !important;
}
.barrage_box {
	background-color: <?php echo $fh_text_bg_color; ?> !important;
	opacity: 0.7;
	padding: 8px;
}
.barrage_box div.p a {
	font-size: <?php echo $fh_font_size; ?>px !important;
	color: <?php echo $fh_headline_text_color; ?> !important;
	text-decoration: none !important;	
}
</style>
<script>
jQuery( document ).ready(function() {             
	
	var fh_barrager_<?php echo $fhs_id; ?> = {
		info: "<?php echo $fh_headline_text; ?>", 						// headline text 
		href: "<?php echo $fh_link; ?>", 								// link on headline 
		close: <?php echo $fh_close_btn; ?>, 							// show or hide close button - true/false
		speed: <?php echo $fh_speed; ?>, 								// speed of runing headline
		//bottom: 70, 													// show headline position from bottom of current screen
		color: '<?php echo $fh_font_color; ?>', 						// headline color
		old_ie_color: '#000000', 										// headline color for Internet Explorer browser
	}
	
	var looper_time=3*1500;
	var run_once=true;
	do_barrager();
	function do_barrager(){
		if(run_once){
			looper=setInterval(do_barrager,looper_time);                
			run_once=false;
		}
		jQuery('body').barrager(fh_barrager_<?php echo $fhs_id; ?>);
	} 
});
</script>
<?php
endwhile;
wp_reset_query();
?>
