<?php

class KBSlide extends DataObject{

	private static $db = array(

		'Title' 		=> 'Varchar',
		'Text'			=> 'Text',
		'SortOrder'		=> 'Int' # Used by SortableGridField module, if installed

	);

	private static $has_one = array(

		'Image'			=> 'Image',
		'Page'			=> 'Page'

	);

	private static $summary_fields = array(

		'GridThumbnail'	=> '',
		'Title'			=> 'Title',
		'Text'			=> 'Text'

	);

	private static $field_names = array(

		'Title'			=> 'Title',
		'Text'			=> 'Text'

	);

	public function getGridThumbnail() {

		if( $this->Image()->exists() )
			return $this->Image()->SetWidth( 100 );

		return _t( 'KBSlide.NoImageExists', '(no image)' );

	}

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