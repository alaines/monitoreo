<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Ejes Controller
 *
 * @property Eje $Eje
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EjesController extends InterseccionesAppController {

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
        $ejes= $this->Eje->find('all');
        $this->set(compact('ejes'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Eje->exists($id)) {
			throw new NotFoundException(__('Invalid eje'));
		}
		$options = array('conditions' => array('Eje.' . $this->Eje->primaryKey => $id));
		$this->set('eje', $this->Eje->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Eje->create();
			if ($this->Eje->save($this->request->data)) {
				$this->Flash->success(__('The eje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The eje could not be saved. Please, try again.'));
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
		if (!$this->Eje->exists($id)) {
			throw new NotFoundException(__('Invalid eje'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Eje->save($this->request->data)) {
				$this->Flash->success(__('The eje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The eje could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Eje.' . $this->Eje->primaryKey => $id));
			$this->request->data = $this->Eje->find('first', $options);
		}
	}

        public function autoCompletado() {
            $this->Eje->recursive = -1;
            $ejes = $this->Eje->find('all', array(
                    'conditions' => array(
                        //' CONCAT( "Eje"."codigo", "Eje"."nombre_via") LIKE '=> '%'.strtoupper($this->request->query['term']).'%'
                        ' "Eje"."nombre_via" LIKE '=> '%'.strtoupper($this->request->query['term']).'%'
                    ),
                    'fields' => array('Eje.id','Eje.nombre_via')
            ));
            $this->set(compact('ejes'));
            $this->layout = 'ajax';
        }
}
