<?php
App::uses('ParqueoAppModel', 'Parqueo.Model');
/**
 * Movement Model
 *
 * @property Lot $Lot
 */
class Movement extends ParqueoAppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'parqueo';

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lot' => array(
			'className' => 'Parqueo.Lot',
			'foreignKey' => 'lot_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function lastMovementState($lot_id = null){
		$this->recursive = -1;
		$result = $this->find('first',['fields'=>['Movement.state','Movement.created'],'conditions' => ['lot_id' => $lot_id],'order' => ['Movement.created'=>'desc']]);
		return $result;
	}

}
