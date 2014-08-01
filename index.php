<?php get_header() ?>

<div class="row">
	<div class="col-md-9">		

	<?php while ( have_posts() ) : the_post() ?>
		<?php get_template_part( 'partials/loop', 'content' ); ?>

		<?php comments_template() ?>
	<?php endwhile; ?>

	<?php get_template_part( 'partials/navigation' ); ?>
	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>