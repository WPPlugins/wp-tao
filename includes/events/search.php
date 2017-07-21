<?php

/*
 * Fire search event
 */

add_action( 'template_redirect', 'wtbp_wptao_event_search_fire' );

function wtbp_wptao_event_search_fire() {

	if ( !is_search() )
		return;

	$s = sanitize_text_field( get_query_var( 's' ) );

	if ( !empty( $s ) ) {
		$args = array(
			'title'	 => __( 'Search', WTBP_WPTAO_DOMAIN ),
			'value'	 => $s,
			'tags'	 => array( 'wp' ),
		);

		do_action( 'wptao_track_event', 'search', $args );
	}
}

// =============================================================================================
// Filters section
// =============================================================================================

/*
 * Creates a title of the action.
 */

add_filter( 'wptao_event_search_title', 'wtbp_wptao_event_search_title', 1, 2 );

function wtbp_wptao_event_search_title( $title, $event ) {

	if ( !empty( $event->value ) ) {

		$link	 = add_query_arg( 's', esc_attr( $event->value ), home_url() );
		$phrase	 = '<a href="' . $link . '">' . esc_attr( $event->value ) . '</a>';

		$title = sprintf( __( 'Searched phrase: %s', WTBP_WPTAO_DOMAIN ), $phrase );
	}



	return $title;
}
