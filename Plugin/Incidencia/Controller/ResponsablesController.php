<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');

class ResponsablesController extends IncidenciaAppController {

	public $components = array('Paginator', 'Session', 'Flash');

	public function index() {
		$this->Responsable->recursive = 0;
                $responsables = $this->Responsable->find('all',array('order' => 'Responsable.id'));
		$this->set(compact('responsables'));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Responsable->create();
			if ($this->Responsable->save($this->request->data)) {
				$this->Flash->success(__('The responsable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The responsable could not be saved. Please, try again.'));
			}
		}
		$equipos = $this->Responsable->Equipo->find('list',array('fields' => array('id','nombre')));
		$this->set(compact('equipos'));
	}

	public function edit($id = null) {
		if (!$this->Responsable->exists($id)) {
			throw new NotFoundException(__('Invalid responsable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Responsable->save($this->request->data)) {
				$this->Flash->success(__('The responsable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The responsable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Responsable.' . $this->Responsable->primaryKey => $id));
			$this->request->data = $this->Responsable->find('first', $options);
		}
		$equipos = $this->Responsable->Equipo->find('list',array('fields' => array('id','nombre')));
		$this->set(compact('equipos'));
	}

        public function listar($id = null, $res = null) {
            if ($res == null){
                $responsables = $this->Responsable->find('list', array('fields'=>array('Responsable.id','Responsable.nombre'), 'conditions' => array('Responsable.equipo_id' => $id, 'estado' => TRUE)));
                $this->set(compact('responsables'));  
            } else {
                $responsables = $this->Responsable->find('list', array('fields'=>array('Responsable.id','Responsable.nombre'), 'conditions' => array('Responsable.equipo_id' => $id, 'estado' => TRUE)));
                $this->set(compact('responsables','res'));  
            }
        }
        

}
