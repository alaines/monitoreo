<?php
App::uses('AccesoAppController', 'Acceso.Controller');

/**
 * CakePHP GruposController
 * @author ALAND
 */
class GruposController extends AccesoAppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'edit');
    }

    public function index() {
        
    }
    
    public function datos($id = NULL) {
        if ($this->request->is('get')) {
            $grupo = $this->Grupo->find('first',array('conditions'=>array('id'=>$id,'estado'=>TRUE)));
        }
        $this->set(compact('grupo'));
        $this->layout = 'ajax'; 
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Grupo->create();
                if ($this->Grupo->save($this->request->data)) {
                    $this->Session->setFlash('Grupo creado.');
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Session->setFlash('Grupo no creado, intente nuevamente.');
                }
        }
                $this->Grupo->recursive = -1;
		$grupos = $this->Grupo->find('all',array('fields'=>array('id','nombre','estado')));
		$this->set(compact('grupos'));
    }
    
    public function edit($id = null) {
        if (!$this->Grupo->exists($id)) {
            throw new NotFoundException('Grupo inválido');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Grupo->save($this->request->data)) {
                $this->Session->setFlash(__('Se editó el grupo correctamente.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('No se pudo editar. Intentelo otra vez.'));
            }
        } else {
            $options = array('recursive' => -1,'conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
            $this->request->data = $this->Grupo->find('first', $options);
        }
    }
    
    public function cambiarEstado(){
        if ($this->request->is(array('post', 'put'))) {
            $this->Grupo->id = $this->request->data['Grupo']['id'];
            if ($this->Grupo->save($this->request->data)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
