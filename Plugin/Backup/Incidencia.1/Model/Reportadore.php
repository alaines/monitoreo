<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Reportadore Model
 *
 * @property Ticket $Ticket
 */
class Reportadore extends IncidenciaAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ticket' => array(
			'className' => 'Incidencia.Ticket',
			'foreignKey' => 'reportadore_id',
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
            if (!empty($this->data['Reportadore']['nombre'])) {
                $this->data['Reportadore']['nombre'] = strtoupper($this->data['Reportadore']['nombre']);
            }
            return true;
        }

}
