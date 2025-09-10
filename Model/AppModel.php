<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    
    public $actsAs = array( 'AuditLog.Auditable' );
    
    public function currentUser() {
        App::uses('AuthComponent', 'Controller/Component');
        return array(
            'id' => AuthComponent::user('id'),
            'description' => AuthComponent::user('usuario'),
        );
    }
    
    public function beforeSave($option = array()){
        parent::beforeSave();
        if(isset($this->data[$this->alias]['usuario_registra']) || empty($this->data[$this->alias]['usuario_registra'])){
            $user = $this->currentUser();
            $this->data[$this->alias]['usuario_registra'] = $user['description'];    
        }
        return true;
    }
}
