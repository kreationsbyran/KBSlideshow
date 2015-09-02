<?php
/**
 * @package KBSlideShow
 */

/**
 * The slide model class that contains all fields and configuration
 * related to individual slides.
 */
class KBSlide extends DataObject{

	/**
	 * Add fields here to easily extend functionality of your slideshow.
	 * Remember to reflect any changes in {@Link KBSlide::getCMSFields()}.
	 *
	 * Example:
	 * 		private static $db = array(
	 *			'Title' => 'Varchar',
	 * 			'Text' => 'Text',
	 * 			'SortOrder' => 'Int',
	 * 			'ContainerClass' => 'Varchar', # Custom field
	 * 			'Autoplay' => 'Boolean' # Custom field
	 * 		);
	 *
	 * @var array
	 */
	private static $db = array(

		'Title' 		=> 'Varchar',
		'Text'			=> 'Text',
		'SortOrder'		=> 'Int' # Used by SortableGridField module, if installed

	);

	/**
	 * KBSlideshow is an extension of Page, hence the has_one relation
	 * with Page rather than {@Link KBSlideshow}.
	 *
	 * @var array
	 */
	private static $has_one = array(

		'Image'			=> 'Image',
		'Page'			=> 'Page'

	);

	/**
	 * Fields shown in the Page CMS GridField.
	 *
	 * @var array
	 */
	private static $summary_fields = array(

		'GridThumbnail'	=> '',
		'Title'			=> 'Title',
		'Text'			=> 'Text'

	);

	/**
	 * Description labels for the fields shown in the Page CMS GridField.
	 *
	 * @var array
	 */
	private static $field_names = array(

		'Title'			=> 'Title',
		'Text'			=> 'Text'

	);

	/**
	 * Thumbnail function that falls back on a string indicating that an
	 * image doesn't exist.
	 *
	 * @return Image|String
	 */
	public function getGridThumbnail() {

		if( $this->Image()->exists() )
			return $this->Image()->SetWidth( 100 );

		return _t( 'KBSlide.NoImageExists', '(no image)' );

	}

	/**
	 * Creates the CMS interface for managing slides.
	 * Remember to update this function to correspond with $db and $has_one
	 * if you are extending the functionality of slides.
	 *
	 * @return FieldList
	 */
	function getCMSFields() {

		$title = TextField::create(
			'Title',
			_t( 'KBSlideshow.Title', 'Title' )
		);

		$text = TextField::create(
			'Text',
			_t( 'KBSlideshow.Text', 'Text' )
		);

		$upload = UploadField::create(
			'Image',
			_t( 'KBSlideshow.Image', 'Image' )
		);
		$upload
			->setAllowedMaxFileNumber( 1 )
			->setRightTitle( _t( 'KBSlide.ImageHelp', 'Upload an image that will represent this slide.' ) );
		$upload
			->getValidator()
			->setAllowedExtensions( array( 'jpg', 'png', 'gif', 'jpeg' )  );

		$fields = FieldList::create(
			array(

				$title,
				$text,
				$upload

			)
		);

		return $fields;
	}
	
}