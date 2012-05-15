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
						'required'	=> array(
										'value' => true,
										'error' => 'You must select a file first'
						),
						'extension'	=> array(
								'value' => array(
									'aif','aifc','aiff','au','kar','mid','midi','mp2','mp3',
									'mpga','ra','ram','rm','rpm','snd','tsi','wav','m4a','m4b','m4p',
									'wma','gz','gtar','z','tgz','zip','rar','rev','tar','7z'
								),
								'error' => 'You cannot upload this type of file.'
						)
						/*'filesize' => array(
										'value' => 5242880,
										'error' => 'This file is too large or small.'
						)*/
					)
		)
	);
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Work' => array(
			'className' => 'Work',
			'foreignKey' => 'work_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
