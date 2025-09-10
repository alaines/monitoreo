<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Ubigeo Model
 *
 * @property Cruce $Cruce
 */
class Ubigeo extends InterseccionesAppModel {

    /**
 * Display field
 *
 * @var string
 */
	public $displayField = 'distrito';

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'foreignKey' => 'ubigeo_id',
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