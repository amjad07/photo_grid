<?php

class GARY_PhotoGridChild extends ET_Builder_Module {

	public $slug       = 'gary_photo_grid_child';
	public $vb_support = 'on';
	public $type			 = 'child';
	public $child_title_var = 'admin_label';

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
		$this->name = esc_html__( 'Photo Grid Child', 'gary-photo_grid_child' );
	}

	public function get_fields() {
		return array(
			'admin_label' => array(
				'label'           => esc_html__( 'Label', 'gary-photo_grid_child' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'gary-photo_grid_child' ),
				'toggle_slug'     => 'main_content',
				'default'					=> 'Content'
			),
			'title' => array(
				'label'           => esc_html__( 'Title', 'gary-photo_grid_child' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Enter Title here', 'gary-photo_grid_child' ),
				'toggle_slug'     => 'main_content',
			),
			'description' => array(
				'label'           => esc_html__( 'Description', 'gary-photo_grid_child' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Enter description here', 'gary-photo_grid_child' ),
				'toggle_slug'     => 'main_content',
			),
			'url_link' => array(
				'label'           => esc_html__( 'Url', 'gary-photo_grid_child' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'link to the url', 'gary-photo_grid_child' ),
				'toggle_slug'     => 'main_content',
			),


		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf(
			 '
			 	<div class="grid_card">
					<a href="%3$s">
						<h3>%1$s</h3>
					</a>
					<p>%2$s</p>
				</div>
			 ',
			 $this->props['title'],
			 $this->props['description'],
			 $this->props['url_link'],
		 );
	}
}

new GARY_PhotoGridChild;
