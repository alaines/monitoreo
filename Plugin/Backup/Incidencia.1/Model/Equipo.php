<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Equipo Model
 *
 * @property Responsable $Responsable
 * @property TicketSeguimiento $TicketSeguimiento
 * @property Ticket $Ticket
 */
class Equipo extends IncidenciaAppModel {

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
		'Responsable' => array(
			'className' => 'Incidencia.Responsable',
			'foreignKey' => 'equipo_id',
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
		'TicketSeguimiento' => array(
			'className' => 'Incidencia.TicketSeguimiento',
			'foreignKey' => 'equipo_id',
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
			'foreignKey' => 'equipo_id',
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
            if (!empty($this->data['Equipo']['nombre'])) {
                $this->data['Equipo']['nombre'] = strtoupper($this->data['Equipo']['nombre']);
            }
            return true;
        }
}
