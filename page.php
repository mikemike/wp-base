<?php get_header() ?>

<div class="row">
	<div class="col-md-9">

		<?php the_post() ?>

		<div id="post-<?php the_ID() ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><?php the_title() ?></h2>
			<div class="entry-content">
				<?php the_content() ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:' ) . '&after=</div>') ?>
				<?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ) ?>
			</div>
		</div><!-- .post -->

		<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->

<?php get_footer() ?>