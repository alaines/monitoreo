<?php
App::uses('ParqueoAppModel', 'Parqueo.Model');
/**
 * Sensor Model
 *
 * @property Lot $Lot
 */
class Sensor extends ParqueoAppModel {

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
		'Lot' => array(
			'className' => 'Parqueo.Lot',
			'foreignKey' => 'lot_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
