<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Periferico Model
 *
 * @property Cruce $Cruce
 */
class Periferico extends InterseccionesAppModel {

        public $actsAs = array( 'AuditLog.Auditable' );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'joinTable' => 'cruces_perifericos',
			'foreignKey' => 'periferico_id',
			'associationForeignKey' => 'cruce_id',
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
            parent::beforeSave();
            if (!empty($this->data['Periferico']['fabricante'])) {
                $this->data['Periferico']['fabricante'] = strtoupper($this->data['Periferico']['fabricante']);
            }
            if (!empty($this->data['Periferico']['modelo'])) {
                $this->data['Periferico']['modelo'] = strtoupper($this->data['Periferico']['modelo']);
            }
            if (!empty($this->data['Periferico']['numero_serie'])) {
                $this->data['Periferico']['numero_serie'] = strtoupper($this->data['Periferico']['numero_serie']);
            }
            if (!empty($this->data['Periferico']['estado'])) {
                $this->data['Periferico']['estado'] = strtoupper($this->data['Periferico']['estado']);
            }
            if (!empty($this->data['Periferico']['observaciones'])) {
                $this->data['Periferico']['observaciones'] = strtoupper($this->data['Periferico']['observaciones']);
            }
            return true;
        }
        
}
