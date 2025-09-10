<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Tipos Controller
 *
 * @property Tipo $Tipo
 * @property PaginatorComponent $Paginator
 */
class TiposController extends InterseccionesAppController {

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
            $this->Tipo->recursive = 0;
            $p_tipos = $this->Tipo->find('list',array('fields'=>array('Tipo.id','Tipo.name'),'conditions' => array('Tipo.parent_id'=>null),'order'=>array('Tipo.name')));
            $padres = $this->Tipo->find('all',array('fields'=>array('Tipo.id','Tipo.name','Tipo.parent_id'),'conditions' => array('Tipo.parent_id'=>null),'order'=>array('Tipo.name')));
            $tipos = $this->Tipo->find('all',['conditions'=>['estado'=>'t'],'order' => ['name ASC']]);
            $this->set(compact('tipos','p_tipos','padres'));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipo->create();
			if ($this->Tipo->save($this->request->data)) {
				$this->Flash->success(__('Datos grabados.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Datos no grabados. Intente nuevamente.'));
			}
		}
             
		$categorias = $this->Tipo->find('list',['fields'=>['id','name'],'conditions'=>['parent_id IS NULL', 'estado' => 't'],'order'=>['name ASC']]);
		$this->set(compact('categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipo->exists($id)) {
			throw new NotFoundException(__('Invalid tipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipo->save($this->request->data)) {
				$this->Flash->success(__('The tipo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The tipo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipo.' . $this->Tipo->primaryKey => $id));
			$this->request->data = $this->Tipo->find('first', $options);
		}
		$categorias = $this->Tipo->find('list',['fields'=>['id','name'],'conditions'=>['parent_id IS NULL', 'estado' => 't'],'order'=>['name ASC']]);
		$this->set(compact('categorias'));
	}

        
}
