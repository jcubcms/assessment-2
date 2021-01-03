<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class U3A_TOWNSVILLE_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'u3a-townsville' ),
				'family'      => esc_html__( 'Font Family', 'u3a-townsville' ),
				'size'        => esc_html__( 'Font Size',   'u3a-townsville' ),
				'weight'      => esc_html__( 'Font Weight', 'u3a-townsville' ),
				'style'       => esc_html__( 'Font Style',  'u3a-townsville' ),
				'line_height' => esc_html__( 'Line Height', 'u3a-townsville' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'u3a-townsville' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'u3a-townsville-ctypo-customize-controls' );
		wp_enqueue_style(  'u3a-townsville-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'u3a-townsville' ),
        'Abril Fatface' => __( 'Abril Fatface', 'u3a-townsville' ),
        'Acme' => __( 'Acme', 'u3a-townsville' ),
        'Anton' => __( 'Anton', 'u3a-townsville' ),
        'Architects Daughter' => __( 'Architects Daughter', 'u3a-townsville' ),
        'Arimo' => __( 'Arimo', 'u3a-townsville' ),
        'Arsenal' => __( 'Arsenal', 'u3a-townsville' ),
        'Arvo' => __( 'Arvo', 'u3a-townsville' ),
        'Alegreya' => __( 'Alegreya', 'u3a-townsville' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'u3a-townsville' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'u3a-townsville' ),
        'Bangers' => __( 'Bangers', 'u3a-townsville' ),
        'Boogaloo' => __( 'Boogaloo', 'u3a-townsville' ),
        'Bad Script' => __( 'Bad Script', 'u3a-townsville' ),
        'Bitter' => __( 'Bitter', 'u3a-townsville' ),
        'Bree Serif' => __( 'Bree Serif', 'u3a-townsville' ),
        'BenchNine' => __( 'BenchNine', 'u3a-townsville' ),
        'Cabin' => __( 'Cabin', 'u3a-townsville' ),
        'Cardo' => __( 'Cardo', 'u3a-townsville' ),
        'Courgette' => __( 'Courgette', 'u3a-townsville' ),
        'Cherry Swash' => __( 'Cherry Swash', 'u3a-townsville' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'u3a-townsville' ),
        'Crimson Text' => __( 'Crimson Text', 'u3a-townsville' ),
        'Cuprum' => __( 'Cuprum', 'u3a-townsville' ),
        'Cookie' => __( 'Cookie', 'u3a-townsville' ),
        'Chewy' => __( 'Chewy', 'u3a-townsville' ),
        'Days One' => __( 'Days One', 'u3a-townsville' ),
        'Dosis' => __( 'Dosis', 'u3a-townsville' ),
        'Droid Sans' => __( 'Droid Sans', 'u3a-townsville' ),
        'Economica' => __( 'Economica', 'u3a-townsville' ),
        'Fredoka One' => __( 'Fredoka One', 'u3a-townsville' ),
        'Fjalla One' => __( 'Fjalla One', 'u3a-townsville' ),
        'Francois One' => __( 'Francois One', 'u3a-townsville' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'u3a-townsville' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'u3a-townsville' ),
        'Great Vibes' => __( 'Great Vibes', 'u3a-townsville' ),
        'Handlee' => __( 'Handlee', 'u3a-townsville' ),
        'Hammersmith One' => __( 'Hammersmith One', 'u3a-townsville' ),
        'Inconsolata' => __( 'Inconsolata', 'u3a-townsville' ),
        'Indie Flower' => __( 'Indie Flower', 'u3a-townsville' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'u3a-townsville' ),
        'Julius Sans One' => __( 'Julius Sans One', 'u3a-townsville' ),
        'Josefin Slab' => __( 'Josefin Slab', 'u3a-townsville' ),
        'Josefin Sans' => __( 'Josefin Sans', 'u3a-townsville' ),
        'Kanit' => __( 'Kanit', 'u3a-townsville' ),
        'Lobster' => __( 'Lobster', 'u3a-townsville' ),
        'Lato' => __( 'Lato', 'u3a-townsville' ),
        'Lora' => __( 'Lora', 'u3a-townsville' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'u3a-townsville' ),
        'Lobster Two' => __( 'Lobster Two', 'u3a-townsville' ),
        'Merriweather' => __( 'Merriweather', 'u3a-townsville' ),
        'Monda' => __( 'Monda', 'u3a-townsville' ),
        'Montserrat' => __( 'Montserrat', 'u3a-townsville' ),
        'Muli' => __( 'Muli', 'u3a-townsville' ),
        'Marck Script' => __( 'Marck Script', 'u3a-townsville' ),
        'Noto Serif' => __( 'Noto Serif', 'u3a-townsville' ),
        'Open Sans' => __( 'Open Sans', 'u3a-townsville' ),
        'Overpass' => __( 'Overpass', 'u3a-townsville' ),
        'Overpass Mono' => __( 'Overpass Mono', 'u3a-townsville' ),
        'Oxygen' => __( 'Oxygen', 'u3a-townsville' ),
        'Orbitron' => __( 'Orbitron', 'u3a-townsville' ),
        'Patua One' => __( 'Patua One', 'u3a-townsville' ),
        'Pacifico' => __( 'Pacifico', 'u3a-townsville' ),
        'Padauk' => __( 'Padauk', 'u3a-townsville' ),
        'Playball' => __( 'Playball', 'u3a-townsville' ),
        'Playfair Display' => __( 'Playfair Display', 'u3a-townsville' ),
        'PT Sans' => __( 'PT Sans', 'u3a-townsville' ),
        'Philosopher' => __( 'Philosopher', 'u3a-townsville' ),
        'Permanent Marker' => __( 'Permanent Marker', 'u3a-townsville' ),
        'Poiret One' => __( 'Poiret One', 'u3a-townsville' ),
        'Quicksand' => __( 'Quicksand', 'u3a-townsville' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'u3a-townsville' ),
        'Raleway' => __( 'Raleway', 'u3a-townsville' ),
        'Rubik' => __( 'Rubik', 'u3a-townsville' ),
        'Rokkitt' => __( 'Rokkitt', 'u3a-townsville' ),
        'Russo One' => __( 'Russo One', 'u3a-townsville' ),
        'Righteous' => __( 'Righteous', 'u3a-townsville' ),
        'Slabo' => __( 'Slabo', 'u3a-townsville' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'u3a-townsville' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'u3a-townsville'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'u3a-townsville' ),
        'Sacramento' => __( 'Sacramento', 'u3a-townsville' ),
        'Shrikhand' => __( 'Shrikhand', 'u3a-townsville' ),
        'Tangerine' => __( 'Tangerine', 'u3a-townsville' ),
        'Ubuntu' => __( 'Ubuntu', 'u3a-townsville' ),
        'VT323' => __( 'VT323', 'u3a-townsville' ),
        'Varela Round' => __( 'Varela Round', 'u3a-townsville' ),
        'Vampiro One' => __( 'Vampiro One', 'u3a-townsville' ),
        'Vollkorn' => __( 'Vollkorn', 'u3a-townsville' ),
        'Volkhov' => __( 'Volkhov', 'u3a-townsville' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'u3a-townsville' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'u3a-townsville' ),
			'100' => esc_html__( 'Thin',       'u3a-townsville' ),
			'300' => esc_html__( 'Light',      'u3a-townsville' ),
			'400' => esc_html__( 'Normal',     'u3a-townsville' ),
			'500' => esc_html__( 'Medium',     'u3a-townsville' ),
			'700' => esc_html__( 'Bold',       'u3a-townsville' ),
			'900' => esc_html__( 'Ultra Bold', 'u3a-townsville' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'u3a-townsville' ),
			'normal'  => esc_html__( 'Normal', 'u3a-townsville' ),
			'italic'  => esc_html__( 'Italic', 'u3a-townsville' ),
			'oblique' => esc_html__( 'Oblique', 'u3a-townsville' )
		);
	}
}
