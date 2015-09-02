<?php
/**
 * @package KBSlideShow
 */

/**
 * A slideshow manager class to handle the slides.
 * This class creates a GridField interface in the CMS for all Pages
 * to manage their Slideshow.
 */
class KBSlideshow extends DataExtension {

	/**
	 * The slideshow has many {@Link KBSlide}
	 * @var array
	 */
	private static $has_many = array(

		"Slides" 	=> "KBSlide",

	);

	/**
	 * Updates the CMS with a GridField to C/R/U/D slides.
	 * @param FieldList $fields
	 */
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

		$fields->addFieldToTab( 'Root.' . _t('KBSlideshow.SINGULARNAME', 'Slideshow'), $gridField );

	}

}
