<?php
/**
 * Main class of plugin.
 *
 * @package 	WP Remove Query Strings From Static Resources
 */

if ( ! class_exists( 'Wprqsfsr_Core' ) ) {
	/**
	 * Core class of plugin.
	 */
	class Wprqsfsr_Core {

		/**
		 * Store link of assist.
		 *
		 * @var string | array
		 */
		public $link;


		/**
		 * Construct method of class.
		 */
		public function __construct() {
			// Let do not apply in Dashboard.
			if ( ! is_admin() ) {
				add_filter( 'script_loader_src', array( $this, 'check_for_question' ), 15, 1 );
				add_filter( 'style_loader_src', array( $this, 'check_for_question' ), 15, 1 );

				add_filter( 'script_loader_src', array( $this, 'check_for_and' ), 15, 1 );
				add_filter( 'style_loader_src', array( $this, 'check_for_and' ), 15, 1 );
			}

		}

		/**
		 * Pick only url from full link.
		 *
		 * @param string $src full path of file.
		 */
		public function check_for_question( $src ) {
			$this->link = explode( '?ver', $src );
			return $this->link[0];
		}

		/**
		 * Pick only url from full link.
		 *
		 * @param string $src full path of file..
		 */
		public function check_for_and( $src ) {
			$this->link = explode( '&ver', $src );
			return $this->link[0];
		}

	}
}
