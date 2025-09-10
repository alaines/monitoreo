<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');
/**
 * Incidencias Controller
 *
 * @property Incidencia $Incidencia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class IncidenciasController extends IncidenciaAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Incidencia->recursive = 0;
                $p_incidencias = $this->Incidencia->find('list',array('fields'=>array('Incidencia.id','Incidencia.tipo'),'conditions' => array('Incidencia.parent_id'=>null),'order'=>array('Incidencia.id')));
                $padres = $this->Incidencia->find('all',array('fields'=>array('Incidencia.id','Incidencia.tipo','Incidencia.parent_id'),'conditions' => array('Incidencia.parent_id'=>null),'order'=>array('Incidencia.id')));
                $incidencias = $this->Incidencia->find('all',array('order'=>array('Incidencia.id','Incidencia.tipo')));
                $prioridades = $this->Incidencia->Prioridade->find('list',['fields'=>['id','nombre']]);
		$this->set(compact('incidencias','p_incidencias','prioridades','padres'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Incidencia->create();
			if ($this->Incidencia->save($this->request->data)) {
				$this->Flash->success(__('Se ha grabado correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} 
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Incidencia->exists($id)) {
			throw new NotFoundException(__('Invalid incidencia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Incidencia->save($this->request->data)) {
				$this->Flash->success(__('The incidencia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The incidencia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Incidencia.' . $this->Incidencia->primaryKey => $id));
			$this->request->data = $this->Incidencia->find('first', $options);
		}
                $prioridades = $this->Incidencia->Prioridade->find('list',['fields'=>['id','nombre']]);
		$parentIncidencias = $this->Incidencia->ParentIncidencia->find('list', ['conditions' => ['ParentIncidencia.parent_id'=>null]]);
                $this->set(compact('prioridades','parentIncidencias'));
	}

        public function tipos($id = null, $opc = null) {
            $tipos = $this->Incidencia->find('list', array('fields'=>array('id','tipo'), 'conditions' => array('parent_id' => $id, 'estado' => TRUE), 'order' => ['tipo ASC']));
            $this->set(compact('tipos','opc'));
        }
        
        public function prioridad($id = null) {
            $this->layout = false;
            $this->Incidencia->recursive = 0;
            $prioridad = $this->Incidencia->find('first', ['fields'=>['Prioridade.id','Prioridade.nombre'],'contain' => 'Prioridade.nombre','conditions' => ['Incidencia.id' => $id, 'Incidencia.estado' => TRUE]]);
            //$response = ['status' => 'success', 'data' => $prioridad];
            $this->response->type('application/json');
            $this->response->body(json_encode($prioridad));
            return $this->response->send();
            //$this->set(['prioridad' => $prioridad, '_serialize' => 'prioridad']);
        }
        
}
