<?php
App::uses('AppModel', 'Model');
/**
 * Upload Model
 *
 * @property Work $Work
 */
class Upload extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	public $actsAs = array(
		'Utils.Sluggable' => array(
			'label' => 'name',
			'method' => 'multibyteSlug'
		),
		'Uploader.FileValidation' => array(
			'fileName' => array(
						'extension'	=> array(
								'value' => array(
									'jpeg','jpg','png','tif','tiff','bmp','gif'
								),
								'required' => false,
								'error' => 'You cannot upload this type of file.'
						)
						/*'filesize' => array(
										'value' => 5242880,
										'error' => 'This file is too large or small.'
						)*/
					)
		)
	);

}
