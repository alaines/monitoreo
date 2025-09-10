<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Administradore Model
 *
 * @property Cruce $Cruce
 */
class Administradore extends InterseccionesAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'foreignKey' => 'administradore_id',
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

    public function beforeSave($option = array()){
        parent::beforeSave();
        if (!empty($this->data['Administradore']['nombre'])) {
            $this->data['Administradore']['nombre'] = strtoupper($this->data['Administradore']['nombre']);
        }
        if (!empty($this->data['Administradore']['responsable'])) {
            $this->data['Administradore']['responsable'] = strtoupper($this->data['Administradore']['responsable']);
        }
        return true;
    }
}
