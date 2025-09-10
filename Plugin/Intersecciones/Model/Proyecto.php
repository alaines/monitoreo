<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Proyecto Model
 *
 * @property Cruce $Cruce
 */
class Proyecto extends InterseccionesAppModel {

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'siglas';
        public $virtualFields = ['nombre' => 'CONCAT(Proyecto.siglas || \' - \' || Proyecto.etapa)'];
        
// The Associations below have been created with all possible keys, those that are not needed can be removed
  
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'foreignKey' => 'proyecto_id',
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
