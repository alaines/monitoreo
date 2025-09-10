<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Prioridade Model
 *
 * @property Ticket $Ticket
 */
class Prioridade extends IncidenciaAppModel {

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
		'Ticket' => array(
			'className' => 'Incidencia.Ticket',
			'foreignKey' => 'prioridade_id',
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
                'Incidencia' => array(
			'className' => 'Incidencia.Incidencia',
			'foreignKey' => 'prioridade_id',
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
