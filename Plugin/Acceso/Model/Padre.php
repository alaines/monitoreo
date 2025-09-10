<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * Padre Model
 *
 * @property Padre $ParentPadre
 * @property Padre $ChildPadre
 */
class Padre extends AccesoAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentPadre' => array(
			'className' => 'Padre',
			'foreignKey' => 'parent_id',
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
		'ChildPadre' => array(
			'className' => 'Padre',
			'foreignKey' => 'parent_id',
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
