<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="page-header">
				<?php the_title( '<h1>', '</h1>' ); ?>
			</div> <!-- .page-header -->
			<?php the_content(); ?>
		</div> <!-- .col-xs-12 -->
	</div> <!-- .row -->
</div> <!-- .container -->

<?php get_footer(); ?>