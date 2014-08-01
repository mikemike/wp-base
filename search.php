<?php get_header() ?>

<div class="row">
	<div class="col-md-9">

		<?php if ( have_posts() ) : ?>

			<h2 class="page-title"><?php _e( 'Search Results for:' ) ?> <span><?php the_search_query() ?></span></h2>

			<?php while ( have_posts() ) : the_post() ?>
				<?php get_template_part( 'partials/loop', 'content' ); ?>
			<?php endwhile; ?>

			<?php get_template_part( 'partials/navigation' ); ?>

		<?php else : ?>

			<div id="post-0" class="post no-results not-found">
				<h2 class="entry-title"><?php _e( 'Nothing Found' ) ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.' ) ?></p>
				</div>
				<form id="searchform-no-results" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-no-results" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Find' ) ?>" />
					</div>
				</form>
			</div><!-- .post -->

		<?php endif; ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>