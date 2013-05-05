<?php get_header();?>

	<div class="listing">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class(); ?>>
		
		<?php if ( has_post_thumbnail() ) { ?> 
		<a class="thumbLink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<?php } ?>
		
		<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
		<?php include("meta.php");?>
		
		<p><?php the_content_rss('', TRUE, '', 55); ?></p> 
		
		<a class="button continue" href="<?php the_permalink() ?>">Continue Reading</a>

        <div class="clear"></div>
		</div><!--end post-->

		<?php endwhile; ?>

		<?php include("navigation.php"); ?>

	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>
	
	</div><!--end listing-->
	
	
<?php get_footer(); ?>