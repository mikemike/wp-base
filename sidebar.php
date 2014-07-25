<div id="primary" class="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
		<h3><?php _e( 'Categories' ) ?></h3>
		<ul>
			<?php wp_list_categories('title_li=&show_count=0&hierarchical=1') ?> 
		</ul>		

		<h3><?php _e( 'Archives' ) ?></h3>
		<ul>
			<?php wp_get_archives('type=monthly') ?>
		</ul>			
	<?php endif; // end primary sidebar widgets  ?>		
</div><!-- #primary .sidebar -->

<div id="secondary" class="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : // begin secondary sidebar widgets ?>		

	<?php endif; // end secondary sidebar widgets  ?>
</div><!-- #secondary .sidebar -->
