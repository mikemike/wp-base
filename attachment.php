<?php get_header() ?>

<div class="row">
	<div class="col-md-9">	

		<?php the_post() ?>

		<h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s' ), _wp_specialchars( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>

		<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
			<h3 class="entry-title"><?php the_title() ?></h3>
			<div class="entry-content">
				<div class="entry-attachment"><a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo _wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a></div>
				<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
				<?php the_content() ?>
			</div>
			<div class="entry-meta">
				<?php printf( __( 'Posted by %1$s on <abbr class="published" title="%2$sT%3$s">%4$s at %5$s</abbr>. Bookmark the <a href="%6$s" title="Permalink to %7$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%8$s" title="Comments RSS to %7$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.' ),
					'<span class="author vcard"><a class="url fn n" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s' ), $authordata->display_name ) . '">' . get_the_author() . '</a></span>',
					get_the_time('Y-m-d'),
					get_the_time('H:i:sO'),
					the_date( '', '', '', false ),
					get_the_time(),
					get_permalink(),
					the_title_attribute('echo=0'),
					esc_url( get_post_comments_feed_link() ) ) ?>

				<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
					<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.' ), get_trackback_url() ) ?>
				<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
					<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.' ), get_trackback_url() ) ?>
				<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
					<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.' ) ?>
				<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
					<?php _e( 'Both comments and trackbacks are currently closed.' ) ?>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>

			</div>
		</div><!-- .post -->

		<?php comments_template() ?>

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->
<?php get_footer() ?>