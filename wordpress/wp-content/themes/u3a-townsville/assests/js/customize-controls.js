( function( api ) {

	// Extends our custom "u3a-townsville" section.
	api.sectionConstructor['u3a-townsville'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );