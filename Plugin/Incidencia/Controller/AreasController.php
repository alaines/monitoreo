<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AreasController extends IncidenciaAppController {

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
		$this->Area->recursive = 0;
		$this->set('areas', $this->Paginator->paginate());
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Area->create();
			if ($this->Area->save($this->request->data)) {
				$this->Flash->success(__('The area has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The area could not be saved. Please, try again.'));
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
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Area->save($this->request->data)) {
				$this->Flash->success(__('The area has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The area could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
			$this->request->data = $this->Area->find('first', $options);
		}
	}
        
}