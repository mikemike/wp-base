<div class="row">
	<div class="col-md-9">	

		<h2 class="page-title"><?php _e( 'Tag Archives:' ) ?> <span><?php single_tag_title() ?></span></h2>

		<div id="nav-above" class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts' ) ) ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>' ) ) ?></div>
		</div>

		<?php while ( have_posts() ) : the_post() ?>
			<?php get_template_part( 'partials/loop', 'content' ); ?>
		<?php endwhile; ?>

		<?php get_template_part( 'partials/navigation' ); ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>