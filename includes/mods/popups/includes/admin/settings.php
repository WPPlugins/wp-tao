<?php

/*
 * Register popups settings
 */

add_filter( 'wptao_settings_sections', 'wptao_popups_settings_sections' );

function wptao_popups_settings_sections( $sections ) {
	if ( is_array( $sections ) ) {

		// Didicated tab
		$sections[] = array(
			'id'	 => 'wptao_popups',
			'title'	 => __( 'Popups', WPTAO_RLS_DOMAIN )
		);
	}

	return $sections;
}

add_filter( 'wptao_settings', 'wptao_popups_settings_fields' );

function wptao_popups_settings_fields( $settings_fields ) {

	$settings_fields[ 'wptao_popups' ][] = array(
		'name'		 => 'enable',
		'label'		 => __( 'Enable popups', WTBP_WPTAO_DOMAIN ),
		'type'		 => 'radio',
		'options'	 => array(
			'enable'	 => __( 'Enable', WTBP_WPTAO_DOMAIN ),
			'disable'	 => __( 'Disable', WTBP_WPTAO_DOMAIN ),
		),
		'default'	 => 'disable',
	);

	$settings_fields[ 'wptao_popups' ][] = array(
		'name'		 => 'cookie_expiry_days',
		'label'		 => __( 'Cookie expiry days', WTBP_WPTAO_DOMAIN ),
		'type'		 => 'number',
		'size'		 => 'small',
		'desc'		 => __( 'Show the popup once more after X days', WTBP_WPTAO_DOMAIN ),
		'default'	 => 365,
	);

	$settings_fields[ 'wptao_popups' ][] = array(
		'name'		 => 'limit_show_in_session',
		'label'		 => __( 'Limit show a popup in one session', WTBP_WPTAO_DOMAIN ),
		'type'		 => 'number',
		'size'		 => 'small',
		'default'	 => 2,
	);

	$settings_fields[ 'wptao_popups' ][] = array(
		'name'		 => 'alt_names_email',
		'label'		 => __( 'Alternative input names (E-mail field)', WTBP_WPTAO_DOMAIN ),
		'type'		 => 'text',
		'size'		 => 'large',
		'desc'		 => __( 'Possible names of the input "E-mail". Separate by comma.', WTBP_WPTAO_DOMAIN ),
		'default'	 => 'e-mail, mail, freshmail_email',
	);

	$settings_fields[ 'wptao_popups' ][] = array(
		'name'		 => 'alt_names_name',
		'label'		 => __( 'Alternative input names (Name field)', WTBP_WPTAO_DOMAIN ),
		'type'		 => 'text',
		'size'		 => 'large',
		'desc'		 => __( 'Possible names of the input "Name". Separate by comma.', WTBP_WPTAO_DOMAIN ),
		'default'	 => 'fname, imie, freshmail_custom_field[imie]',
	);


	return $settings_fields;
}
