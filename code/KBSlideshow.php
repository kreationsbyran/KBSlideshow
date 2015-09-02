<?php
/**
 * @package KBSlideShow
 */

/**
 * A slideshow manager class.
 * This class creates an interface in the CMS to manage the slideshow.
 * Injects to all Pages under the tab "Slideshow" (tab is translatable using KBSlideshow.SINGULARNAME).
 */
class KBSlideshow extends DataExtension {

	/**
	 * Fields correspond with basic slick.js options.
	 *
	 * Add fields here to easily extend functionality of your slideshow.
	 * Particularly useful if you are using a custom carousel library
	 * and want to control its settings through the CMS.
	 *
	 * Example:
	 * 		private static $db = array(
	 *			'Width' => 'Varchar',
	 * 			'Height' => 'Text',
	 * 			'Autoplay' => 'Boolean' # Custom field
	 * 		);
	 *
	 * Remember to reflect any changes in {@Link KBSlideshow::getCMSFields()}.
	 *
	 * @var array
	 */
	private static $db = array(

		# -- Used by template --
		'Width' 		=> 'Varchar',
		'Height'		=> 'Varchar',

	);

	/**
	 * The slideshow has many {@Link KBSlide}
	 * @var array
	 */
	private static $has_many = array(

		'KBSlides' 	=> 'KBSlide',

	);

	/**
	 * Updates the CMS with a GridField to manage slides.
	 * @param FieldList $fields
	 */
	function updateCMSFields( FieldList $fields ) {

		$cfg = GridFieldConfig_RelationEditor::create( $slides_per_page = 5 );

		# Utilizes SortableGridField if installed
		# https://github.com/UndefinedOffset/SortableGridField
		if( class_exists( 'GridFieldSortableRows' ) )
			$cfg->addComponent( new GridFieldSortableRows( 'SortOrder' ) );

		$gridField = GridField::create(
			'KBSlides',								# Name
			_t( 'KBSlide.PLURALNAME', 'Slides' ),	# Title
			$this->owner->KBSlides(),				# DataList
			$cfg									# Config
		);

		$width = NumericField::create(
			'Width',
			_t( 'KBSlideshow.Width' ,'Width' )
		)->setRightTitle( _t( 'KBSlideshow.WidthHelp', '' ) );
		
		$height = NumericField::create(
			'Height',
			_t( 'KBSlideshow.Height' ,'Height' )
		)->setRightTitle( _t( 'KBSlideshow.HeightHelp', '' ) );

		$fields->addFieldsToTab(
			'Root.' . _t( 'KBSlideshow.SINGULARNAME', 'Slideshow' ),
			array(

				$gridField,
				$width,
				$height

			)
		);

	}

}
