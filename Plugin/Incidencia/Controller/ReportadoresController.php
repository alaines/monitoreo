<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');
/**
 * Reportadores Controller
 *
 * @property Reportadore $Reportadore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ReportadoresController extends IncidenciaAppController {

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
		$this->Reportadore->recursive = 0;
		$this->set('reportadores', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reportadore->create();
			if ($this->Reportadore->save($this->request->data)) {
				$this->Flash->success(__('The reportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reportadore could not be saved. Please, try again.'));
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
		if (!$this->Reportadore->exists($id)) {
			throw new NotFoundException(__('Invalid reportadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reportadore->save($this->request->data)) {
				$this->Flash->success(__('The reportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reportadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reportadore.' . $this->Reportadore->primaryKey => $id));
			$this->request->data = $this->Reportadore->find('first', $options);
		}
	}

}
