<?php
App::uses('AppController', 'Controller');
/**
 * EstadoCivils Controller
 *
 * @property EstadoCivil $EstadoCivil
 * @property PaginatorComponent $Paginator
 */
class EstadoCivilsController extends AppController {

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
		$this->EstadoCivil->recursive = 0;
		$this->set('estadoCivils', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstadoCivil->exists($id)) {
			throw new NotFoundException(__('Invalid estado civil'));
		}
		$options = array('conditions' => array('EstadoCivil.' . $this->EstadoCivil->primaryKey => $id));
		$this->set('estadoCivil', $this->EstadoCivil->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstadoCivil->create();
			if ($this->EstadoCivil->save($this->request->data)) {
				$this->Flash->success(__('The estado civil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The estado civil could not be saved. Please, try again.'));
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
		if (!$this->EstadoCivil->exists($id)) {
			throw new NotFoundException(__('Invalid estado civil'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstadoCivil->save($this->request->data)) {
				$this->Flash->success(__('The estado civil has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The estado civil could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstadoCivil.' . $this->EstadoCivil->primaryKey => $id));
			$this->request->data = $this->EstadoCivil->find('first', $options);
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
		if (!$this->EstadoCivil->exists($id)) {
			throw new NotFoundException(__('Invalid estado civil'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EstadoCivil->delete($id)) {
			$this->Flash->success(__('The estado civil has been deleted.'));
		} else {
			$this->Flash->error(__('The estado civil could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function listar() {
            $listas = $this->EstadoCivil->find('list',array('fields'=>array('EstadoCivil.id','EstadoCivil.nombre'),'conditions' => array('EstadoCivil.estado' => 'TRUE'), 'recursive' => 0));
            if ($this->request->is('requested')) {
                return $listas;
            }
            $this->set('listas', $posts);
        }
}
