<?php if (in_array( 'wp-pagenavi/wp-pagenavi.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) { ?>
      <?php wp_pagenavi(); ?>
<?php } else { ?>
	<div class="navigation">
	<div id="nextpage" class="pagenav alignright"><?php next_posts_link('Next Page &raquo;') ?></div>
	<div id="backpage" class="pagenav alignleft"><?php previous_posts_link('&laquo; Previous Page') ?></div>
	</div>
<?php } ?> 
	

