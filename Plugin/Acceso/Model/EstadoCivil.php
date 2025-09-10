<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * EstadoCivil Model
 *
 * @property Persona $Persona
 */
class EstadoCivil extends AccesoAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Persona' => array(
			'className' => 'Acceso.Persona',
			'foreignKey' => 'estado_civil_id',
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
