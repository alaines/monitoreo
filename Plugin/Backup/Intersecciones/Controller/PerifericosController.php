<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Perifericos Controller
 *
 * @property Periferico $Periferico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PerifericosController extends InterseccionesAppController {
    
    public $uses = ['Intersecciones.Periferico','Intersecciones.Tipo'];

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
		$this->Periferico->recursive = 0;
		$this->set('perifericos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Periferico->exists($id)) {
			throw new NotFoundException(__('Invalid periferico'));
		}
		$options = array('conditions' => array('Periferico.' . $this->Periferico->primaryKey => $id));
		$this->set('periferico', $this->Periferico->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($cruce_id = null) {
		if ($this->request->is('post')) {
			$this->Periferico->create();
			if ($this->Periferico->save($this->request->data)) {
				$this->Flash->success(__('Datos grabados correctamente.'));
				return $this->redirect(array('controller'=>'cruces','action' => 'perifericos',$cruce_id));
			} else {
				$this->Flash->error(__('Datos NO grabados. Intente nuevamente.'));
			}
		}
                $tipo_periferico = $this->Tipo->listarTipos('periferico');
		$this->set(compact('cruce_id','tipo_periferico'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $cruce_id = null) {
		if (!$this->Periferico->exists($id)) {
			throw new NotFoundException(__('Invalid periferico'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Periferico->save($this->request->data)) {
				$this->Flash->success(__('The periferico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The periferico could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Periferico.' . $this->Periferico->primaryKey => $id));
			$this->request->data = $this->Periferico->find('first', $options);
		}
		$tipo_periferico = $this->Tipo->listarTipos('periferico');
		$this->set(compact('cruce_id','tipo_periferico'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Periferico->exists($id)) {
			throw new NotFoundException(__('Invalid periferico'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Periferico->delete($id)) {
			$this->Flash->success(__('The periferico has been deleted.'));
		} else {
			$this->Flash->error(__('The periferico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
