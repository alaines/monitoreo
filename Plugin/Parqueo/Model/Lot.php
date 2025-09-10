<?php
App::uses('ParqueoAppModel', 'Parqueo.Model');
/**
 * Lot Model
 *
 * @property Parking $Parking
 * @property Movement $Movement
 * @property Sensor $Sensor
 */
class Lot extends ParqueoAppModel {

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
	public $displayField = 'code';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Parking' => array(
			'className' => 'Parqueo.Parking',
			'foreignKey' => 'parking_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Movement' => array(
			'className' => 'Parqueo.Movement',
			'foreignKey' => 'lot_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Sensor' => array(
			'className' => 'Parqueo.Sensor',
			'foreignKey' => 'lot_id',
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
