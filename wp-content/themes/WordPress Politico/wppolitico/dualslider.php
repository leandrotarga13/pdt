<div class="carousel clearfix">
	<div class="panel">		
		<div class="details_wrapper">
			<div class="details">
				<?php 
					$category = get_option_tree('category');
					$number = get_option_tree('number');
				?>
				<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('cat='. $category .'&showposts='. $number .'');  ?>
				<?php if ($showPostsInCategory->have_posts()) :?>
				<?php while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post(); ?>
				<?php $data = get_post_meta( $post->ID, 'key', true ); ?>
					<div class="detail">
						<h2><?php the_title(); ?></h2>
						<p><?php the_content_rss('', TRUE, '', 27); ?>
						<?php  if ($data[ 'custom_link' ]) { ?>
							<a class="sliderMore" href="<?php echo $data[ 'custom_link' ]; ?>">Continue &raquo;</a></p>
						<?php } else { ?>
							<a class="sliderMore" href="<?php the_permalink() ?>">Continue &raquo;</a></p>
						<?php } ?>
					</div><!-- /detail -->
				<?php endwhile; endif; ?>															
			</div><!-- /details -->
		</div><!-- /details_wrapper -->
				
		<div class="paging">
			<div id="numbers"></div>
			<a href="javascript:void(0);" class="dualNav previous" title="Previous" >Previous</a>
			<a href="javascript:void(0);" class="dualNav next" title="Next">Next</a>
		</div><!-- /paging -->
				
		<a href="javascript:void(0);" class="dualNav play tooltip" title="Turn on autoplay">Play</a>
		<a href="javascript:void(0);" class="dualNav pause tooltip" title="Turn off autoplay">Pause</a>
	</div><!-- /panel -->
	
	<div class="backgrounds">
		<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('cat='. $category .'&showposts='. $number .'');  ?>
		<?php if ($showPostsInCategory->have_posts()) :?>
		<?php while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post(); ?>
			<div class="item">
					
				<?php $data = get_post_meta( $post->ID, 'key', true ); ?>
				<?php  if ($data[ 'custom_video' ]) { ?>
					<?php echo $data[ 'custom_video' ]; ?>
				<?php } else { ?>
					<?php  if ($data[ 'custom_link' ]) { ?>
							<a href="<?php echo $data[ 'custom_link' ]; ?>"><?php the_post_thumbnail('dual'); ?></a>
						<?php } else { ?>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('dual'); ?></a>
						<?php } ?>
				<?php } ?>
				
			</div><!-- /item -->
		<?php endwhile; endif; ?>		
	</div><!-- /backgrounds -->			
</div><!-- /carousel --> 