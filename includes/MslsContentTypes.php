<?php
/**
 * MslsContentTypes
 * @author Dennis Ploetner <re@lloc.de>
 * @since 0.9.8
 */

/**
 * Supported content types
 * @package Msls
 */
class MslsContentTypes {

	/**
	 * Request
	 * @var string
	 */
	protected $request;

	/**
	 * Types
	 * @var array
	 */
	protected $types = array();

	/**
	 * Factory method
	 * @return MslsContentTypes
	 */
	static function create() {
		if ( filter_has_var( INPUT_GET, 'taxonomy' ) ) {
			return MslsTaxonomy::instance();
		}
		return MslsPostType::instance();
	}

	/**
	 * Check for post_type
	 * @return bool
	 */
	public function is_post_type() {
		return false;
	}

	/**
	 * Check for taxonomy
	 * @return bool
	 */
	public function is_taxonomy() {
		return false;
	}

	/**
	 * Getter
	 * @return array
	 */
	public function get() {
		return (array) $this->types;
	}

	/**
	 * Gets the request if it is an allowed content type
	 * @return string
	 */
	public function get_request() {
		return(
			in_array( $this->request, $this->types ) ?
			$this->request :
			''
		);
	}
	
}