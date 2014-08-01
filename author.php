<?php get_header() ?>

<div class="row">
	<div class="col-md-9">

		<?php the_post() ?>

		<h2 class="page-title author"><?php printf( __( 'Author Archives: <span class="vcard">%s</span>' ), "<a class='url fn n' href='$authordata->user_url' title='$authordata->display_name' rel='me'>$authordata->display_name</a>" ) ?></h2>
		<?php $authordesc = $authordata->user_description; if ( !empty($authordesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $authordesc . '</div>' ); ?>

		<div id="nav-above" class="navigation">
			<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>' )) ?></div>
		</div>

		<?php rewind_posts() ?>

		<?php while ( have_posts() ) : the_post() ?>
			<?php get_template_part( 'partials/loop', 'content' ); ?>
		<?php endwhile ?>

		<?php get_template_part( 'partials/navigation' ); ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>