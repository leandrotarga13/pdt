<div id="nivoSlider">
	<?php 
		$category = get_option_tree('category');
		$number = get_option_tree('number');
	?>
	<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('cat='. $category .'&showposts='. $number .'');  ?>
	<?php if ($showPostsInCategory->have_posts()) :?>
	<?php while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post(); ?>
	
		<?php $data = get_post_meta( $post->ID, 'key', true ); if ($data[ 'custom_link' ]) { ?>
			<a href="<?php echo $data[ 'custom_link' ]; ?>" title="<?php the_title_attribute(); ?>">
		<?php } else { ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<?php the_post_thumbnail('nivo'); ?>
		</a>
		
	<?php endwhile; endif;  wp_reset_query();?>
</div>