<?php
App::uses('ParqueoAppModel', 'Parqueo.Model');
/**
 * Parking Model
 *
 * @property Lot $Lot
 */
class Parking extends ParqueoAppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'parqueo';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Lot' => array(
			'className' => 'Parqueo.Lot',
			'foreignKey' => 'parking_id',
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
