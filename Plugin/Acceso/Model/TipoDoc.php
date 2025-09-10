<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * TipoDoc Model
 *
 * @property Persona $Persona
 */
class TipoDoc extends AccesoAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tipo_doc';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Persona' => array(
			'className' => 'Acceso.Persona',
			'foreignKey' => 'tipo_doc_id',
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
