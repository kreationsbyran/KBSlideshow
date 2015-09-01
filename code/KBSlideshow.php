<?php

class KBSlideshow extends DataExtension {

	private static $has_many = array(

		"Slides" 	=> "KBSlide",

	);

	function updateCMSFields( FieldList $fields ) {

		$cfg = GridFieldConfig_RelationEditor::create( $slides_per_page = 5 );

		# Utilizes SortableGridField if installed
		# https://github.com/UndefinedOffset/SortableGridField
		if( class_exists( 'GridFieldSortableRows' ) )
			$cfg->addComponent( new GridFieldSortableRows( 'SortOrder' ) );


		$gridField = GridField::create(
			'Slides',								# Name
			_t( 'KBSlide.PLURALNAME', 'Slides' ),	# Title
			$this->owner->Slides(),					# DataList
			$cfg									# Config
		);

		$fields->addFieldToTab( 'Root.Slideshow', $gridField );

	}

}
