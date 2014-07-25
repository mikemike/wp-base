<?php get_header() ?>

<div class="row">
	<div class="col-md-9">

		<h2 class="page-title"><?php _e( 'Category Archives:' ) ?> <span><?php single_cat_title() ?></span></h2>
		<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>

		<div id="nav-above" class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts' ) ) ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>' ) ) ?></div>
		</div>

<?php while ( have_posts() ) : the_post() ?>

		<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __( 'Permalink to %s' ), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h3>
			<div class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s' ), the_date( '', '', '', false ), get_the_time() ) ?></abbr></div>
			<div class="entry-content">
<?php the_excerpt(__( 'Read More <span class="meta-nav">&raquo;</span>' )) ?>

			</div>
			<div class="entry-meta">
				<span class="author vcard"><?php printf( __( 'By %s' ), '<a class="url fn n" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></span>
				<span class="meta-sep">|</span>
				<span class="cat-links"><?php __( 'Categories:' ) ?> <?php the_category(', '); ?></span>
				<?php the_tags( __( '<span class=\"meta-sep\">|</span> <span class="tag-links">Tagged ' ), ", ", "</span>\n" ) ?>
				<?php edit_post_link( __( 'Edit' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n" ) ?>
			</div>
		</div><!-- .post -->

<?php endwhile; ?>

		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts' ) ) ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>' ) ) ?></div>
		</div>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->

<?php get_sidebar() ?>
<?php get_footer() ?>