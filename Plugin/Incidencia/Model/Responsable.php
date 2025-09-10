<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Responsable Model
 *
 * @property Equipo $Equipo
 * @property TicketSeguimiento $TicketSeguimiento
 */
class Responsable extends IncidenciaAppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Equipo' => array(
			'className' => 'Incidencia.Equipo',
			'foreignKey' => 'equipo_id',
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
		'TicketSeguimiento' => array(
			'className' => 'Incidencia.TicketSeguimiento',
			'foreignKey' => 'responsable_id',
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
