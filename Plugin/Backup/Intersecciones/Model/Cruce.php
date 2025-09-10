<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Cruce Model
 *
 * @property Ubigeo $Ubigeo
 * @property Administradore $Administradore
 * @property Proyecto $Proyecto
 * @property Eje $Eje
 * @property Ticket $Ticket
 * @property Periferico $Periferico
 */
class Cruce extends InterseccionesAppModel {

    public $actsAs = array( 'AuditLog.Auditable' );

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ubigeo' => array(
			'className' => 'Intersecciones.Ubigeo',
			'foreignKey' => 'ubigeo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Administradore' => array(
			'className' => 'Intersecciones.Administradore',
			'foreignKey' => 'administradore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proyecto' => array(
			'className' => 'Incidencia.Proyecto',
			'foreignKey' => 'proyecto_id',
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
		'Ticket' => array(
			'className' => 'Incidencia.Ticket',
			'foreignKey' => 'cruce_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Periferico' => array(
			'className' => 'Intersecciones.Periferico',
			'joinTable' => 'cruces_perifericos',
			'foreignKey' => 'cruce_id',
			'associationForeignKey' => 'periferico_id',
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
        if (!empty($this->data['Cruce']['observaciones'])) {
            $this->data['Cruce']['observaciones'] = strtoupper($this->data['Cruce']['observaciones']);
        }
        return true;
    }
    
    public function consulta($data = null){
        $this->Behaviors->load('Containable');
        $this->recursive = -1;
        if(isset($data['filas'])){
            $data['filas'] == 'NULL' ? $limit = '' : $limit = (int) $data['filas'];
        } else {
            $limit = 10;
        }
        //isset($data['filas']) || $data['filas'] == 'NULL' ? $limit = (int) $data['filas'] : $limit = 'NULL';
        $conditions = array();
        if($data != null){
            if((int) $data['cruce_id'] <> 0){$conditions['Cruce.id'] = (int) $data['cruce_id'];}
            if((int) $data['ubigeo_id'] <> 0){$conditions['ubigeo_id'] = (int) $data['ubigeo_id'];}
            if((int) $data['proyecto_id'] <> 0){$conditions['proyecto_id'] = (int) $data['proyecto_id'];}
            if((int) $data['administradore_id'] <> 0){$conditions['administradore_id'] = (int) $data['administradore_id'];}
            if((int) $data['tipo_comunicacion'] <> 0){$conditions['tipo_comunicacion'] = (int) $data['tipo_comunicacion'];}
        }
        $this->contain(['Ubigeo'=>['fields' => ['id','distrito']], 'Proyecto'=>['fields'=>['nombre']], 'Administradore'=>['fields'=>['nombre']]]);
        $result = $this->find('all', ['fields'=>['codigo','nombre','codigo_anterior'],'conditions' => $conditions, 'order' => ['Cruce.codigo'], 'limit' => $limit]);
        return $result;
    }
    
}
