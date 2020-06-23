<?php

class GARY_PhotoGridParent extends ET_Builder_Module {

	public $slug       = 'gary_photo_grid';
	public $vb_support = 'on';
	public $child_slug = "gary_photo_grid_child";
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
		$this->name = esc_html__( 'Photo Grid', 'gary-photo_grid' );
	}

	public function get_fields() {
		return array(
			'shape_slider' => array(
				'label'           => esc_html__( 'Aspect Ratio', 'gary-photo_grid' ),
				'type'            => 'range',
				'range_setting'		=> array(
						'min'		=>	'50%',
						'max'		=>	'200%',
						'step'	=>	'10%',
				),
				'fixed_unit'			=> '%',
				'default'					=>	'100%',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'gary-photo_grid_child' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		ET_Builder_Element::set_style($render_slug, array(
			'selector'			=>	'.grid_card',
			'declaration'		=>	"padding-top: {$this->props['shape_slider']};"
		));

		ET_Builder_Element::set_style($render_slug, array(
			'selector'			=>	'.grid_card a',
			'declaration'		=>	"margin-top: -{$this->props['shape_slider']};"
		));
		return $this->content;
	}
}

new GARY_PhotoGridParent;
