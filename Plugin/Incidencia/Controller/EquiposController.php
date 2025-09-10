<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EquiposController extends IncidenciaAppController {

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
		$this->Equipo->recursive = 0;
		$this->set('equipos', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipo->create();
			if ($this->Equipo->save($this->request->data)) {
				$this->Flash->success(__('The equipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The equipo could not be saved. Please, try again.'));
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
		if (!$this->Equipo->exists($id)) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Equipo->save($this->request->data)) {
				$this->Flash->success(__('The equipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The equipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Equipo.' . $this->Equipo->primaryKey => $id));
			$this->request->data = $this->Equipo->find('first', $options);
		}
	}

}
