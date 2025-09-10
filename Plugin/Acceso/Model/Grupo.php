<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * Grupo Model
 *
 * @property Usuario $Usuario
 * @property Menu $Menu
 */
class Grupo extends AccesoAppModel {

    public $actsAs = array( 'AuditLog.Auditable' ); 

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
			'className' => 'Acceso.User',
			'foreignKey' => 'grupo_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Menu' => array(
			'className' => 'Acceso.Menu',
			'joinTable' => 'grupos_menus',
			'foreignKey' => 'grupo_id',
			'associationForeignKey' => 'menu_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

    public function beforeSave($option = array()){
        if (!empty($this->data['Grupo']['nombre'])) {
            $this->data['Grupo']['nombre'] = strtoupper($this->data['Grupo']['nombre']);
        }
        return true;
    }

}
