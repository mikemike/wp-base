<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
	<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
	<div class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s' ), the_date( '', '', '', false ), get_the_time() ) ?></abbr></div>
	<div class="entry-content">
		<?php the_excerpt( __( 'Read More <span class="meta-nav">&raquo;</span>' ) ) ?>

		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:' ) . '&after=</div>') ?>
	</div>
	<div class="entry-meta">
		<span class="cat-links"><?php printf( __( 'Posted in %s' ), get_the_category_list(', ') ) ?></span>
		<?php the_tags( __( '<span class=\"meta-sep\">|</span> <span class="tag-links">Tagged ' ), ", ", "</span>\n" ) ?>
		<?php edit_post_link( __( 'Edit' ), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n" ) ?>
	</div>
</div> <!-- .post -->