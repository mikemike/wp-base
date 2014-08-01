<?php get_header() ?>

<div class="row">
	<div class="col-md-9">

		<h2 class="page-title"><?php _e( 'Category Archives:' ) ?> <span><?php single_cat_title() ?></span></h2>
		<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>

		<?php while ( have_posts() ) : the_post() ?>
			<?php get_template_part( 'partials/loop', 'content' ); ?>
		<?php endwhile; ?>

		<?php get_template_part( 'partials/navigation' ); ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->

<?php get_sidebar() ?>
<?php get_footer() ?>