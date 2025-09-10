<?php
App::uses('ParqueoAppController', 'Parqueo.Controller');
/**
 * Parkings Controller
 *
 * @property Parking $Parking
 * @property PaginatorComponent $Paginator
 */
class ParkingsController extends ParqueoAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Parking->recursive = 0;
		$this->set('parkings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parking->exists($id)) {
			throw new NotFoundException(__('Invalid parking'));
		}
		$options = array('conditions' => array('Parking.' . $this->Parking->primaryKey => $id));
		$this->set('parking', $this->Parking->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parking->create();
			if ($this->Parking->save($this->request->data)) {
				$this->Flash->success(__('The parking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The parking could not be saved. Please, try again.'));
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
		if (!$this->Parking->exists($id)) {
			throw new NotFoundException(__('Invalid parking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parking->save($this->request->data)) {
				$this->Flash->success(__('The parking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The parking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parking.' . $this->Parking->primaryKey => $id));
			$this->request->data = $this->Parking->find('first', $options);
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
		if (!$this->Parking->exists($id)) {
			throw new NotFoundException(__('Invalid parking'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Parking->delete($id)) {
			$this->Flash->success(__('The parking has been deleted.'));
		} else {
			$this->Flash->error(__('The parking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
