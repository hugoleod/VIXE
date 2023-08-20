( function( api ) {

	// Extends our custom "church-services" section.
	api.sectionConstructor['church-services'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );