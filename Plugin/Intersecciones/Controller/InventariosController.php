<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');

class InventariosController extends InterseccionesAppController {
    
    public $uses = [
        'Intersecciones.Cruce',
        'Intersecciones.Tipo',
        'Intersecciones.Eje',
        'Intersecciones.Signal'];
    
    public function index() {
        if ($this->request->is(array('post', 'put'))) {
            //debug($this->data);
            return $this->redirect(array('action' => 'add',$this->data['cruce_id']));
        }
        
    }
    
    public function add($cruce_id = null) {
        if (!$this->Cruce->exists($cruce_id)) {
            throw new NotFoundException(__('No existe intersección'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //debug($this->request->data);
            $data = $this->_unSetArrays($this->request->data);
            //debug($data);
            //this->Cruce->Conexionado->create();
            if ($this->Cruce->saveAll($data)) {
                $this->Flash->success(__('Datos grabados correctamente.'));
                return $this->redirect(array('action' => 'add',$cruce_id));
            }
        } else {
            $options = array('conditions' => array('Cruce.' . $this->Cruce->primaryKey => $cruce_id));
            $this->request->data = $this->Cruce->find('first', $options);
        }
        $vias = $this->Eje->find('all',['fields'=>['nombre_via'],'conditions'=>['id' =>[$this->data['Cruce']['via1'],$this->data['Cruce']['via2']]]]);
        $tipo_gestion = $this->Tipo->listarTipos('gestion');
        $tipo_control = $this->Tipo->listarTipos('control');
        $tipo_comunicacion = $this->Tipo->listarTipos('comunicacion');
        $tipo_cruce = $this->Tipo->listarTipos('cruce');
        $tipo_estructura = $this->Tipo->listarTipos('estructura');
        $tipo_operacion = $this->Tipo->listarTipos('operacion');
        //Tipos formularios
        $tipo_poste = $this->Tipo->listarTipos('postes');
        $tipo_placa = $this->Tipo->listarTipos('placa');
        //Tipo Señal
        //$tipo_senal = $this->Signal->find('list',['conditions'=>['nivel'=>3],'order'=>['parent_id ASC','name ASC']]);
        $tipo_senal = $this->Signal->list_select();
        $ubigeos = $this->Cruce->Ubigeo->find('list',['fields'=>['id','distrito']]);
        $administradores = $this->Cruce->Administradore->find('list',['conditions'=>['estado' => true ],'fields'=>['id','nombre'],'order'=>'nombre ASC']);
        $proyectos = $this->Cruce->Proyecto->find('list',['fields' => ['id','nombre'],'conditions'=>['estado' => true ]]);
        $this->set(compact('tipo_senal','tipo_poste','cruce_id','ubigeos','administradores','proyectos','tipo_placa','tipo_gestion','tipo_control','tipo_comunicacion','tipo_cruce','tipo_estructura','tipo_operacion','vias'));
    }
    
    private function _unSetArrays($data = []) {
        $lista = ['Conexionado','Semaforo','Estructura'];
        foreach ($lista as $l){
            if(array_key_exists($l, $data)){
                $num = count($data[$l]);
                for($i = 0; $i < $num; $i++){
                    if(empty(trim($data[$l][$i]['tipo']))){
                        unset($data[$l][$i]);
                    }
                }
            }
            //sort($data[$l]);
        }
        return $data;
    }
    
    public function rowreturn($cruce_id,$tipo,$num){
        $this->set(compact('cruce_id','num'));
        switch($tipo){
            case 'cx':
                $vista = '/Elements/row-conexionado';
                break;
            case 'sm':
                $vista = '/Elements/row-semaforo';
                break;
            case 'es':
                $vista = '/Elements/row-estructura';
                break;
            case 'sn':
                $tipo_senal = $this->Signal->list_select();
                $this->set(compact('tipo_senal'));
                $vista = '/Elements/row-senales';
                break;
            case 'ga':
                $vista = '/Elements/row-gabinete';
                break;
        }
        $this->render($vista);
    }
    
}




