<?php
App::uses('InterseccionesAppModel', 'Intersecciones.Model');
/**
 * Tipo Model
 *
 * @property Tipo $ParentTipo
 * @property Tipo $ChildTipo
 */
class Tipo extends InterseccionesAppModel {

    /**
     * Behaviors
     *
     * @var array
     */
    public $actsAs = ['Tree'];
    
    public function beforeSave($option = array()){
        parent::beforeSave();
        if (!empty($this->data['Tipo']['name'])) {
            $this->data['Tipo']['name'] = strtoupper($this->data['Tipo']['name']);
        }
        return true;
    }
    
    public function listarTipos($categoria) {
        $tipo = $this->find('first',['fields'=> ['id'],'conditions' => ['name' => strtoupper($categoria), 'estado'=>'t']]);
        $lista = $this->find('list',['fields' => ['id','name'], 'conditions'=>['parent_id'=> $tipo['Tipo']['id'], 'estado' => 't'],'order'=>'name ASC']);
        return $lista;
    }
    
}
