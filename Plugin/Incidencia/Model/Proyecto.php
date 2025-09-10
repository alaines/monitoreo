<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Proyecto Model
 *
 * @property Cruce $Cruce
 */
class Proyecto extends IncidenciaAppModel {

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
        
        public function beforeSave($option = array()){
            parent::beforeSave();
            if (!empty($this->data['Proyecto']['nombre'])) {
                $this->data['Proyecto']['nombre'] = strtoupper($this->data['Proyecto']['nombre']);
            }
            if (!empty($this->data['Proyecto']['siglas'])) {
                $this->data['Proyecto']['siglas'] = strtoupper($this->data['Proyecto']['siglas']);
            }
            if (!empty($this->data['Proyecto']['etapa'])) {
                $this->data['Proyecto']['etapa'] = strtoupper($this->data['Proyecto']['etapa']);
            }
            if (!empty($this->data['Proyecto']['empresa'])) {
                $this->data['Proyecto']['empresa'] = strtoupper($this->data['Proyecto']['empresa']);
            }
            return true;
        }

}
