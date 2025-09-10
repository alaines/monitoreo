<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');

class Estructura extends InterseccionesAppModel {

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
