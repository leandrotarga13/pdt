</div><!--end main-->

<?php $theme_options = get_option('option_tree'); ?>

<?php get_sidebar(); ?>

<div class="clear"></div>
</div><!--end content-->
</div><!--end contentContainer-->

<?php if(get_option_tree('footer_on_off')) { ?>
<a class="backTop" href="#"></a>

	<div id="footerWidgets">
		<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : endif; ?>
		</ul>
		<div class="clear"></div>
	</div><!--end footerWidgets-->
<?php } ?>

<a class="backTop" href="#"></a>

<div id="footerContainer">
<div id="footer">  

	<a class="logo" href="<?php bloginfo('url')?>"><?php bloginfo('name'); ?></a>    
	
	<?php wp_nav_menu(array('theme_location' => 'footer', 'container_id' => 'footerNav', 'menu_id' => 'footmenu')); ?>
	
	<div id="socialIcons">
	<a class="socialicon" id="rss" href="<?php bloginfo('rss2_url'); ?>"  title="Subscribe via RSS" rel="nofollow">RSS</a>

	<?php if(get_option_tree('twitter')) { ?>
	<a class="socialicon" id="twitter" href="<?php get_option_tree('twitter',$theme_options,'true'); ?>" title="Follow me on Twitter"  rel="nofollow">Twitter</a>
	<? } ?>
	
	<?php if(get_option_tree('facebook')) { ?> 
	<a class="socialicon" id="facebook" href="<?php get_option_tree('facebook',$theme_options,'true'); ?>"  title="Facebook Profile" rel="nofollow">Facebook</a>
	<? } ?>
	
	<?php if(get_option_tree('flikr')) { ?>
	<a class="socialicon" id="flikr" href="<?php get_option_tree('flikr',$theme_options,'true'); ?>"  title="Flikr Profile" rel="nofollow">Flikr</a>
	<? } ?>	
	
	<?php if(get_option_tree('myspace')) { ?>
	<a class="socialicon" id="myspace" href="<?php get_option_tree('myspace',$theme_options,'true'); ?>"  title="MySpace Profile" rel="nofollow">MySpace</a>
	<? } ?>
	
	<?php if(get_option_tree('linkedin')) { ?> 
	<a class="socialicon" id="linkedin" href="<?php get_option_tree('linkedin',$theme_options,'true'); ?>"  title="LinkedIn Profile" rel="nofollow">LinkedIn</a>
	<? } ?>
	
	<?php if(get_option_tree('youtube')) { ?> 
	<a class="socialicon" id="youtube" href="<?php get_option_tree('youtube',$theme_options,'true'); ?>"  title="YouTube Profile" rel="nofollow">YouTube</a>
	<? } ?>
	<div class="clear"></div>
	</div><!--end socialIcons-->
	
	<div id="copyright">
	&copy; Copyright <?php echo date("Y "); bloginfo('name'); ?>. All rights reserved. Powered by <a href="http://www.wikmag.com/wordpress-politico-theme-by-themeforest.html" target="_blank">Politico Theme</a>
	</div>

</div><!--end footer-->
</div><!--end footerContainer-->

<script src="<?php bloginfo('template_url'); ?>/scripts/scripts.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict(); jQuery(document).ready(function(){
	molitorscripts(); 
	tooltip();  
	
	//SLIDER STUFF
	jQuery(".carousel").dualSlider({
		auto:true,
		autoDelay: 10000,
		easingCarousel: "swing",
		easingDetails: "swing",
		durationCarousel: 1000,
		durationDetails: 500
	});	
	jQuery('#nivoSlider').fadeIn(400).nivoSlider({
		effect:'<?php get_option_tree('nivo_effect',$theme_options,'true');?>',
		slices:15,
		animSpeed:500,
		pauseTime:5000,
		directionNav:true,
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		beforeChange: function(){},
		afterChange: function(){}
	});
			
	jQuery(".paging .next, .paging .previous, .panel .pause, .panel .play").css("opacity",.4).hover(function(){
		jQuery(this).css("opacity",1);
	},function() {
		jQuery(this).css("opacity",.4);
	});
	
});
</script>
<?php wp_footer(); ?>

</body>
</html>