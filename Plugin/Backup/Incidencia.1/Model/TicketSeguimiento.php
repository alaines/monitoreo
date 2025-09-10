<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * TicketSeguimiento Model
 *
 * @property Ticket $Ticket
 * @property Equipo $Equipo
 * @property Responsable $Responsable
 * @property Estado $Estado
 */
class TicketSeguimiento extends IncidenciaAppModel {

    public $actAs = array('AuditLog.Auditable');

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ticket' => array(
			'className' => 'Incidencia.Ticket',
			'foreignKey' => 'ticket_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Equipo' => array(
			'className' => 'Incidencia.Equipo',
			'foreignKey' => 'equipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Responsable' => array(
			'className' => 'Incidencia.Responsable',
			'foreignKey' => 'responsable_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estado' => array(
			'className' => 'Incidencia.Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function beforeSave($option = array()){
        parent::beforeSave();
        if (!empty($this->data['TicketSeguimiento']['reporte'])) {
            $this->data['TicketSeguimiento']['reporte'] = strtoupper($this->data['TicketSeguimiento']['reporte']);
        }
        return true;
    }
    
}
