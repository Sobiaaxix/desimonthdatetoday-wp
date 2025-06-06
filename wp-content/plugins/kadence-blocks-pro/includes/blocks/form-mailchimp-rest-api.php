<?php
/**
 * REST API Mailchimp controller customized for Kadence Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * REST API Products controller class.
 *
 * @package WooCommerce/API
 */
class Kadence_MailChimp_REST_Controller extends WP_REST_Controller {

	/**
	 * Api key property name.
	 */
	const PROP_API_KEY = 'apikey';

	/**
	 * Include property name.
	 */
	const PROP_END_POINT = 'endpoint';

	/**
	 * Per page property name.
	 */
	const PROP_QUERY_ARGS = 'queryargs';


	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->namespace = 'kb-mailchimp/v1';
		$this->rest_base = 'get';
	}

	/**
	 * Registers the routes for the objects of the controller.
	 *
	 * @see register_rest_route()
	 */
	public function register_routes() {
		register_rest_route(
			$this->namespace,
			'/' . $this->rest_base,
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_items' ),
					'permission_callback' => array( $this, 'get_items_permission_check' ),
					'args'                => $this->get_collection_params(),
				),
			)
		);
	}
	/**
	 * Checks if a given request has access to search content.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return true|WP_Error True if the request has search access, WP_Error object otherwise.
	 */
	public function get_items_permission_check( $request ) {
		return current_user_can( 'edit_posts' );
	}

	/**
	 * Retrieves a collection of objects.
	 *
	 * @param WP_REST_Request $request Full details about the request.
	 * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
	 */
	public function get_items( $request ) {
		$api_key    = $request->get_param( self::PROP_API_KEY );
		$end_point  = $request->get_param( self::PROP_END_POINT );
		$query_args = $request->get_param( self::PROP_QUERY_ARGS );

		if ( empty( $api_key ) ) {
			return array();
		}
		$key_parts = explode( '-', $api_key );
		if ( empty( $key_parts[1] ) || 0 !== strpos( $key_parts[1], 'us' ) ) {
			return array();
		}

		$base_url     = 'https://' . $key_parts[1] . '.api.mailchimp.com/3.0/';
		$request_args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'user:' . $api_key ),
			),
		);
		if ( $query_args && is_array( $query_args ) ) {
			$args = array();
			foreach ( $query_args as $key => $value ) {
				$value_parts             = explode( '=', $value );
				$args[ $value_parts[0] ] = $value_parts[1];
			}
			$url = add_query_arg( $args, $base_url . $end_point );
		} else {
			$url = $base_url . $end_point;
		}
		$response = wp_safe_remote_get( $url, $request_args );

		if ( is_wp_error( $response ) || 200 != (int) wp_remote_retrieve_response_code( $response ) ) {
			// error_log( 'response failed' );
			return array();
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( ! is_array( $body ) ) {
			// error_log( 'no content' );
			return array();
		}
		$groups = array();
		if ( 'interest-categories/' === substr( $end_point, -20 ) && isset( $body['categories'] ) ) {
			foreach ( $body['categories'] as $category ) {
				$url                = $base_url . $end_point . $category['id'] . '/interests?count=100';
				$interests_response = wp_safe_remote_get( $url, $request_args );
				if ( ! is_wp_error( $interests_response ) ) {
					$interests_response_body = json_decode( wp_remote_retrieve_body( $interests_response ), true );
					if ( isset( $interests_response_body['interests'] ) && is_array( $interests_response_body['interests'] ) ) {
						foreach ( $interests_response_body['interests']  as $interest ) {
							$groups[] = array(
								'id' => $interest['id'],
								'title' => $category['title'] . ' - ' . $interest['name'],
							);
						}
					}
				}
			}
			return $groups;
		}

		return $body;
	}
	/**
	 * Retrieves the query params for the search results collection.
	 *
	 * @return array Collection parameters.
	 */
	public function get_collection_params() {
		$query_params = parent::get_collection_params();

		$query_params[ self::PROP_API_KEY ] = array(
			'description' => __( 'The API Key for mailchimp account.', 'kadence-blocks-pro' ),
			'type'        => 'string',
		);

		$query_params[ self::PROP_END_POINT ] = array(
			'description' => __( 'Actionable endpoint for api call.', 'kadence-blocks-pro' ),
			'type'        => 'string',
		);

		$query_params[ self::PROP_QUERY_ARGS ] = array(
			'description' => __( 'Query Args for url.', 'kadence-blocks-pro' ),
			'type'        => 'array',
		);

		return $query_params;
	}
}
