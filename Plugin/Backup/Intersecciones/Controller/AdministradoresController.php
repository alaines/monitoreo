<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Administradores Controller
 *
 * @property Administradore $Administradore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AdministradoresController extends InterseccionesAppController {

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
		$this->Administradore->recursive = 0;
		$this->set('administradores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Administradore->exists($id)) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		$options = array('conditions' => array('Administradore.' . $this->Administradore->primaryKey => $id));
		$this->set('administradore', $this->Administradore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Administradore->create();
			if ($this->Administradore->save($this->request->data)) {
				$this->Flash->success(__('The administradore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The administradore could not be saved. Please, try again.'));
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
		if (!$this->Administradore->exists($id)) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Administradore->save($this->request->data)) {
				$this->Flash->success(__('The administradore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The administradore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Administradore.' . $this->Administradore->primaryKey => $id));
			$this->request->data = $this->Administradore->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Administradore->exists($id)) {
			throw new NotFoundException(__('Invalid administradore'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Administradore->delete($id)) {
			$this->Flash->success(__('The administradore has been deleted.'));
		} else {
			$this->Flash->error(__('The administradore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
