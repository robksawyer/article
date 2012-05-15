<?php
App::uses('AppModel', 'Model');
/**
 * Artist Model
 *
 * @property Work $Work
 */
class Artist extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fullname';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fullname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must enter the artist\'s name.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'email' => array(
			'isValid' => array(
				'rule' => 'email',
				'required' => false,
				'message' => 'Please enter a valid email address.'
			),
			'isUnique' => array(
				'rule' => array('isUnique','email'),
				'required' => false,
				'message' => 'This email is already in use.'
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Work' => array(
			'className' => 'Work',
			'foreignKey' => 'artist_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
