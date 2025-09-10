<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * CrucesPeriferico Model
 *
 * @property Cruce $Cruce
 * @property Periferico $Periferico
 */
class CrucesPeriferico extends InterseccionesAppModel {


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
		),
		'Periferico' => array(
			'className' => 'Intersecciones.Periferico',
			'foreignKey' => 'periferico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
