<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div  <?php post_class(); ?>>
			
		<div class="entry">
		
		<?php include("meta.php");?>
						
		<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                		
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>						
			
				
		<div class="clear"></div>
        </div><!--end entry-->
        
        <br />
                        
        <div id="commentsection">
		<?php comments_template(); ?>
        </div>

	</div><!--end post-->

<?php endwhile; endif; ?>
        
<?php get_footer(); ?>