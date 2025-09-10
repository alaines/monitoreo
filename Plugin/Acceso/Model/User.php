<?php
App::uses('AccesoAppModel', 'Acceso.Model');
App::uses('Md5PasswordHasher', 'Controller/Component/Auth');

/**
 * Usuario Model
 *
 * @property Persona $Persona
 * @property Grupo $Grupo
 * @property Area $Area
 */
class User extends AccesoAppModel {

    public $actsAs = array( 'AuditLog.Auditable' ); 

    
	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Persona' => array(
			'className' => 'Acceso.Persona',
			'foreignKey' => 'persona_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grupo' => array(
			'className' => 'Acceso.Grupo',
			'foreignKey' => 'grupo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Acceso.Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['clave'])) {
            $passwordHasher = new Md5PasswordHasher();
            $this->data[$this->alias]['clave'] = $passwordHasher->hash($this->data[$this->alias]['clave']);
        }
        if (!empty($this->data[$this->alias]['usuario'])){
            $this->data[$this->alias]['usuario'] = strtolower($this->data[$this->alias]['usuario']);
        }
        return true;
    }
}
