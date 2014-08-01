<?php get_header() ?>
<div class="row">
	<div class="col-md-9">	

	<?php the_post() ?>

	<?php if ( is_day() ) : ?>
		<h2 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_time(get_option('date_format')) ) ?></h2>
	<?php elseif ( is_month() ) : ?>
		<h2 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_time('F Y') ) ?></h2>
	<?php elseif ( is_year() ) : ?>
		<h2 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_time('Y') ) ?></h2>
	<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
		<h2 class="page-title"><?php _e( 'Blog Archives' ) ?></h2>
	<?php endif; ?>

	<?php rewind_posts() ?>

		<div id="nav-above" class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts' ) ) ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>' ) ) ?></div>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>		
			<?php get_template_part( 'partials/loop', 'content' ); ?>
		<?php endwhile; ?>

		<?php get_template_part( 'partials/navigation' ); ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>