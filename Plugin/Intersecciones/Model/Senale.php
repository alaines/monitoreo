<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Senale Model
 *
 * @property Cruce $Cruce
 * @property Signal $Signal
 */
class Senale extends InterseccionesAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cruce' => array(
			'className' => 'Cruce',
			'foreignKey' => 'cruce_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Signal' => array(
			'className' => 'Signal',
			'foreignKey' => 'signal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
