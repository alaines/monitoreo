<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Semaforo Model
 *
 * @property Cruce $Cruce
 */
class Conexionado extends InterseccionesAppModel {

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
