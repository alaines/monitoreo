<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * GruposMenu Model
 *
 * @property Menu $Menu
 * @property Grupo $Grupo
 */
class GruposMenu extends AccesoAppModel {

        public $actsAs = array( 'AuditLog.Auditable' ); 

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Acceso.Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grupo' => array(
			'className' => 'Acceso.Grupo',
			'foreignKey' => 'grupo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
