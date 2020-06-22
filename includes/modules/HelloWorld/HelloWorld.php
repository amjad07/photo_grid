<?php

class GARY_HelloWorld extends ET_Builder_Module {

	public $slug       = 'gary_hello_world';
	public $vb_support = 'on';
	/**
	* Enqueues non-minified, hot reloaded javascript bundles.
	*
	* @since 3.1
	*/
	protected function _enqueue_debug_bundles() {
	  // Frontend Bundle
	  $site_url       = wp_parse_url( get_site_url() );
	  $hot_bundle_url = "http://localhost:3000/static/js/frontend-bundle.js";
	  wp_enqueue_script( "{$this->name}-frontend-bundle", $hot_bundle_url, $this->_bundle_dependencies['frontend'], $this->version, true );
	  if ( et_core_is_fb_enabled() ) {
	    // Builder Bundle
	    $hot_bundle_url = "http://localhost:3000/static/js/builder-bundle.js";
	    wp_enqueue_script( "{$this->name}-builder-bundle", $hot_bundle_url, $this->_bundle_dependencies['builder'], $this->version, true );
	  }
	}
	protected $module_credits = array(
		'module_uri' => '#',
		'author'     => 'Muhammad Amajd',
		'author_uri' => '#',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'gary-photo_grid' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'gary-photo_grid' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'gary-photo_grid' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new GARY_HelloWorld;
