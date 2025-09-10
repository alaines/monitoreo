<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Signal Model
 *
 * @property Senale $Senale
 */
class Signal extends InterseccionesAppModel {

    
    	public $actsAs = array(
		'Tree',
                'AuditLog.Auditable'
	);
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Senale' => array(
			'className' => 'Senale',
			'foreignKey' => 'signal_id',
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
        if (!empty($this->data['Signal']['name'])) {
            $this->data['Signal']['name'] = strtoupper($this->data['Signal']['name']);
        }
        if (!empty($this->data['Signal']['code'])) {
            $this->data['Signal']['code'] = strtoupper($this->data['Signal']['code']);
        }
        return true;
    }

    public function list_select(){
        $lista = $this->query("SELECT \"Signal\".id as \"id\", CONCAT(s2.\"name\", ' - ', \"Signal\".\"name\") AS \"tipo_senal\" FROM public.signals as \"Signal\" LEFT JOIN \"public\".\"signals\" AS s2 ON (\"Signal\".\"parent_id\" = s2.\"id\") WHERE \"Signal\".nivel = 3;");
        $i = 0;
        foreach ($lista as $l) {
           $result[$l[0]['id']] = $l[0]['tipo_senal'];
           $i++;
        }
        return $result;
    }
}
