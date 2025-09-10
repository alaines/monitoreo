<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Incidencia Model
 *
 * @property Incidencia $ParentIncidencia
 * @property Incidencia $ChildIncidencia
 * @property Ticket $Ticket
 */
class Incidencia extends IncidenciaAppModel {

/**
 * Behaviors
 *
 * @var array
 
	public $actsAs = array(
		'Tree',
                'AuditLog.Auditable'
	);
*/
    
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tipo';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentIncidencia' => array(
			'className' => 'Incidencia.Incidencia',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Prioridade' => array(
                        'className' => 'Incidencia.Prioridade',
                        'foreignKey' => 'prioridade_id',
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
		'ChildIncidencia' => array(
			'className' => 'Incidencia.Incidencia',
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
		),
		'Ticket' => array(
			'className' => 'Incidencia.Ticket',
			'foreignKey' => 'incidencia_id',
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
            if (!empty($this->data['Incidencia']['tipo'])) {
                $this->data['Incidencia']['tipo'] = strtoupper($this->data['Incidencia']['tipo']);
            }
            return true;
        }
}
