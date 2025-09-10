<?php
App::uses('AccesoAppModel', 'Acceso.Model');
/**
 * Persona Model
 *
 * @property TipoDoc $TipoDoc
 * @property EstadoCivil $EstadoCivil
 * @property Usuario $Usuario
 */
class Persona extends AccesoAppModel {
    
    public $actsAs = array( 'AuditLog.Auditable' ); 

    // The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TipoDoc' => array(
			'className' => 'Acceso.TipoDoc',
			'foreignKey' => 'tipo_doc_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EstadoCivil' => array(
			'className' => 'Acceso.EstadoCivil',
			'foreignKey' => 'estado_civil_id',
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
		'Usuario' => array(
			'className' => 'Acceso.User',
			'foreignKey' => 'persona_id',
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
        if (!empty($this->data['Persona']['nombres']) && !empty($this->data['Persona']['ape_pat']) && !empty($this->data['Persona']['ape_mat'])) {
            $this->data['Persona']['nombres'] = strtoupper($this->data['Persona']['nombres']);
            $this->data['Persona']['ape_pat'] = strtoupper($this->data['Persona']['ape_pat']);
            $this->data['Persona']['ape_mat'] = strtoupper($this->data['Persona']['ape_mat']);
            $this->data['Persona']['nomcomp'] = $this->data['Persona']['nombres'].' '.$this->data['Persona']['ape_pat'].' '.$this->data['Persona']['ape_mat'];
        }
        return true;
    }

}
