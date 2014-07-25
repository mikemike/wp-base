<?php
/*
Template Name: Links Page
*/
?>
<?php get_header() ?>


<div class="row">
	<div class="col-md-9">	

		<?php the_post() ?>

		<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
			<h2 class="entry-title"><?php the_title() ?></h2>
			<div class="entry-content">
				<?php the_content() ?>

				<ul id="links-page" class="xoxo">
					<?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=<li id="page-%id" class="%class">&after=</li>') ?>
				</ul>
				<?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ) ?>

			</div>
		</div><!-- .post -->

		<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to enable comments on pages! ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>