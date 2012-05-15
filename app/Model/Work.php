<?php
App::uses('AppModel', 'Model');
/**
 * Work Model
 *
 * @property Artist $Artist
 * @property Publication $Publication
 * @property Upload $Upload
 */
class Work extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	public $validate = array(
		'artist_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publication_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	public $actsAs = array(
		'Uploader.FileValidation' => array(
			'fileName' => array(
						'required'	=> array(
								'value' => false,
								'error' => 'You must select a file first'
						),
						'extension'	=> array(
								'value' => array(
									'jpeg','jpg','png','tif','tiff','bmp','gif'
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
		'Artist' => array(
			'className' => 'Artist',
			'foreignKey' => 'artist_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'publication_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MediaType' => array(
			'className' => 'MediaType',
			'foreignKey' => 'media_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Upload' => array(
			'className' => 'Upload',
			'foreignKey' => 'upload_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
