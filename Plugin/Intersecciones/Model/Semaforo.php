<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Semaforo Model
 *
 * @property Cruce $Cruce
 */
class Semaforo extends InterseccionesAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'foreignKey' => 'cruce_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
