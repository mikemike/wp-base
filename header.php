<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '-', true, 'right' ); echo _wp_specialchars( get_bloginfo('name'), 1 ) ?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/main.css">


	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts' ), _wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments' ), _wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="top-cont">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php if(is_home()): ?><h1><?php endif; ?>
					<a href="/" class="logo"><?php echo (file_exists(get_template_directory().'/assets/img/logo.png') ? '<img src="'.get_bloginfo('template_directory').'/assets/img/logo.png" alt="'.str_replace('"', '', get_bloginfo('name')).'">' : get_bloginfo('name')); ?></a>
				<?php if(is_home()): ?></h1><?php endif; ?>
			</div> <!-- .col-md-9 -->

			<div class="col-md-3">
				<form id="searchform" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div class="form-group">
						<input id="s" name="s" type="text" class="form-control" value="<?php the_search_query() ?>" size="10" tabindex="1" placeholder="Search" />
					</div>
				</form>
			</div> <!-- .col-md-3 -->
		</div> <!-- .row -->

		 <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

	</div> <!-- .container -->
</header>

<div class="container">