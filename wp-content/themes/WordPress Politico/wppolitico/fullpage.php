<?php
/*
Template Name: Full Page (no sidebar)
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="entry">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>				
		</div>
 
	<div class="clear"></div>
	<?php endwhile; endif; ?>
		
    <div id="commentsection">
	<?php comments_template(); ?>
    </div>
	
<?php get_footer(); ?>