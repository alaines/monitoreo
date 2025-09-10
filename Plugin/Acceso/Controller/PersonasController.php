<?php
App::uses('AccesoAppController', 'Acceso.Controller');
/**
 * Personas Controller
 *
 * @property Persona $Persona
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PersonasController extends AccesoAppController {

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
		$this->Persona->recursive = 0;
		$this->set('personas', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Persona->create();
			if ($this->Persona->save($this->request->data)) {
				$this->Flash->success(__('The persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The persona could not be saved. Please, try again.'));
			}
		}
		$tipoDocs = $this->Persona->TipoDoc->find('list');
		$estadoCivils = $this->Persona->EstadoCivil->find('list',array('fields'=>array('id','nombre')));
		$this->set(compact('tipoDocs', 'estadoCivils'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Persona->exists($id)) {
			throw new NotFoundException(__('Invalid persona'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Persona->save($this->request->data)) {
				$this->Flash->success(__('The persona has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The persona could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Persona.' . $this->Persona->primaryKey => $id));
			$this->request->data = $this->Persona->find('first', $options);
		}
		$tipoDocs = $this->Persona->TipoDoc->find('list');
		$estadoCivils = $this->Persona->EstadoCivil->find('list',array('fields'=>array('id','nombre')));
		$this->set(compact('tipoDocs', 'estadoCivils'));
	}

}
