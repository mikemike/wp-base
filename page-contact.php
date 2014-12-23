<?php
/*
Template Name: Contact
*/
?>
<?php get_header() ?>
<?php the_post() ?>

<div class="row">
	<div class="col-md-9">		

		<h1><?php the_title(); ?></h1>

		<div class="row">
			<div class="col-xs-6">
				<address>
					<strong>Head Office</strong><br>
					<?php
						$address = get_theme_mod( 'tcx_address_1' );
						$address.= get_theme_mod( 'tcx_address_2' ) ? ', '.get_theme_mod( 'tcx_address_2' ) : '';
						$address.= get_theme_mod( 'tcx_citytown' )	? ', '.get_theme_mod( 'tcx_citytown' ) : '';
						$address.= get_theme_mod( 'tcx_county' ) 	? ', '.get_theme_mod( 'tcx_county' ) : '';
						$address.= get_theme_mod( 'tcx_postcode' ) 	? ', '.get_theme_mod( 'tcx_postcode' ) : '';
						$address.= get_theme_mod( 'tcx_country' ) 	? ', '.get_theme_mod( 'tcx_country' ) : '';
						echo $address;
					?>
				</address>
			</div>
			<div class="col-xs-6">
				<?php the_content(); ?>
			</div>
		</div> <!-- .row -->			

	</div> <!-- .col-md-9 -->
	<div class="col-md-3">
		<?php get_sidebar() ?>
	</div> <!-- .col-md-3 -->
</div> <!-- .row -->

<?php get_footer() ?>