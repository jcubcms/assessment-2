<?php


if ( ! class_exists( 'U3a_Townsville_Content_Creation' ) ) :

	
	class U3a_Townsville_Content_Creation extends WP_Customize_Control {

		
		public $type = 'content-creation';

		
		public $button_text = '';

		
		public $button_url = '#';

		
		public $options = array();

		
		public $explained_features = array();

		
		public function __construct( WP_Customize_Manager $manager, $id, array $args ) {
			$this->button_text;
			$manager->register_control_type( 'U3a_Townsville_Content_Creation' );
			parent::__construct( $manager, $id, $args );

		}

		
		public function to_json() {
			parent::to_json();
			$this->json['button_text']        = $this->button_text;
			$this->json['button_url']         = $this->button_url;
			$this->json['options']            = $this->options;
			$this->json['explained_features'] = $this->explained_features;
		}

		
		public function content_template() {
			?>
			<div class="content-themeinfo">
				<# if ( data.options ) { #>
					<ul class="content-themeinfo-features">
						<# for (option in data.options) { #>
							<li><span class="upsell-pro-label"></span>{{ data.options[option] }}
							</li>
							<# } #>
					</ul>
					<# } #>

					<# if ( data.button_text && data.button_url ) { #>
						<a href="{{ data.button_url }}" class="button button-primary">{{
							data.button_text }}</a>
						<# } #>

						<# if ( data.explained_features.length > 0 ) { #>
						<hr />

						<ul class="content-themeinfo-feature-list">
							<# for (requirement in data.explained_features) { #>
								<li>* {{{ data.explained_features[requirement] }}}</li>
								<# } #>
						</ul>
				<# } #>
			</div>
		<?php
		}
	}
endif;
