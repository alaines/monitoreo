<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * CrucesPerifericos Controller
 *
 * @property CrucesPeriferico $CrucesPeriferico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CrucesPerifericosController extends InterseccionesAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CrucesPeriferico->create();
			if ($this->CrucesPeriferico->save($this->request->data)) {
				$this->Flash->success(__('The cruces periferico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cruces periferico could not be saved. Please, try again.'));
			}
		}
		$cruces = $this->CrucesPeriferico->Cruce->find('list');
		$perifericos = $this->CrucesPeriferico->Periferico->find('list');
		$this->set(compact('cruces', 'perifericos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CrucesPeriferico->exists($id)) {
			throw new NotFoundException(__('Invalid cruces periferico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CrucesPeriferico->save($this->request->data)) {
				$this->Flash->success(__('The cruces periferico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cruces periferico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CrucesPeriferico.' . $this->CrucesPeriferico->primaryKey => $id));
			$this->request->data = $this->CrucesPeriferico->find('first', $options);
		}
		$cruces = $this->CrucesPeriferico->Cruce->find('list');
		$perifericos = $this->CrucesPeriferico->Periferico->find('list');
		$this->set(compact('cruces', 'perifericos'));
	}

}
