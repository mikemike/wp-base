<?php

/**
 * Register the main menu
 * @author Mike Griffiths
 * @param $wp_customize Class Instance of WP_Customize_Control()
 */
function register_main_menu() {
	register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_main_menu' );

/**
 * Register theme customizations.  Builds the side menu of the customizer.
 * @author Mike Griffiths
 * @param $wp_customize Class Instance of WP_Customize_Control()
 */
function tcx_register_theme_customizer( $wp_customize ) {

	// Textarea control
	class Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}

	// Hidden control
	class Customize_Hidden_Control extends WP_Customize_Control {
	    public $type = 'hidden';
	 
	    public function render_content() {
	        ?>
	        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
	        <?php
	    }
	}

	/***
	 *** Address
	 ***/
    $wp_customize->add_section(
	    'tcx_section_address',
	    array(
	        'title'     => __('Address'),
	        'priority'  => 200
	    )
	);

    // Address line 1
    $wp_customize->add_setting(
	    'tcx_address_1',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_address_1',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('Address Line 1'),
	        'type'     => 'text',
	        'priority' => 500,
	    )
	);

	// Address line 2
    $wp_customize->add_setting(
	    'tcx_address_2',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_address_2',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('Address Line 2'),
	        'type'     => 'text',
	        'priority' => 600,
	    )
	);

	// City/Town
    $wp_customize->add_setting(
	    'tcx_citytown',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_citytown',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('City/Town'),
	        'type'     => 'text',
	        'priority' => 700,
	    )
	);

	// County/State
    $wp_customize->add_setting(
	    'tcx_county',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_county',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('County'),
	        'type'     => 'text',
	        'priority' => 800,
	    )
	);

	// Postcode
    $wp_customize->add_setting(
	    'tcx_postcode',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_postcode',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('Postcode'),
	        'type'     => 'text',
	        'priority' => 900,
	    )
	);

	// Country
    $wp_customize->add_setting(
	    'tcx_country',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    'tcx_country',
	    array(
	        'section'  => 'tcx_section_address',
	        'label'    => __('Country'),
	        'type'     => 'text',
	        'priority' => 1000,
	    )
	);
 
	// Latitude
    $wp_customize->add_setting(
	    'tcx_lat',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
	    new Customize_Hidden_Control( $wp_customize, 'tcx_lat', array(
		    'label'   => __('Latitude'),
		    'section' => 'tcx_section_address',
		    'settings' => 'tcx_lat',
		    'priority' => 1200
		) )
	);

	// Longitude
    $wp_customize->add_setting(
	    'tcx_lng',
	    array(
	        'default'   => '',
	    )
	);
	 
	$wp_customize->add_control(
		new Customize_Hidden_Control( $wp_customize, 'tcx_lng', array(
		    'label'   => __('Longitude'),
		    'section' => 'tcx_section_address',
		    'settings' => 'tcx_lng',
		    'priority' => 1200
		) )
	);
}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

/**
 * Grab Lat & Long
 * @author Mike Griffiths
 * @param $wp_customize Class Instance of WP_Customize_Control()
 */
function grabLatLng( $wp_customize ){

	$address_1 = get_theme_mod( 'tcx_address_1' );
	$address_2 = get_theme_mod( 'tcx_address_2' );
	$citytown = get_theme_mod( 'tcx_citytown' );
	$county = get_theme_mod( 'tcx_county' );
	$postcode = get_theme_mod( 'tcx_postcode' );
	$country = get_theme_mod( 'tcx_country' );

	$address = $address_1;
	$address.= (empty($address_2) ? '' : ', '.$address_2);
	$address.= (empty($citytown) ? '' : ', '.$citytown);
	$address.= (empty($county) ? '' : ', '.$county);
	$address.= (empty($postcode) ? '' : ', '.$postcode);
	$address.= (empty($country) ? '' : ', '.$country);

	$string = str_replace (" ", "+", urlencode($address));
	$details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $details_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = json_decode(curl_exec($ch), true);

	// If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
	if ($response['status'] != 'OK') {
		// Problem
	} else {
		$geometry = $response['results'][0]['geometry'];

		$latitude = $geometry['location']['lat'];
		$longitude = $geometry['location']['lng'];

		set_theme_mod( 'tcx_lat', $latitude );
		set_theme_mod( 'tcx_lng', $longitude );
	}
}
add_action( 'customize_save_after', 'grabLatLng' );

?>