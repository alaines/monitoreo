<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');

class ProyectosController extends IncidenciaAppController {

    public $components = array('Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Proyecto->recursive = 0;
                $proyectos = $this->Proyecto->find('all');
		$this->set(compact('proyectos'));
	}

/**
 * add method
 *
 * @return voidt
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Proyecto->create();
			if ($this->Proyecto->save($this->request->data)) {
				$this->Flash->success(__('The proyecto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The proyecto could not be saved. Please, try again.'));
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
		if (!$this->Proyecto->exists($id)) {
			throw new NotFoundException(__('Invalid proyecto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Proyecto->save($this->request->data)) {
				$this->Flash->success(__('The proyecto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The proyecto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Proyecto.' . $this->Proyecto->primaryKey => $id));
			$this->request->data = $this->Proyecto->find('first', $options);
		}
	}

    public function autoCompletado() {
        $this->Proyecto->recursive = -1;
        $proyectos = $this->Proyecto->find('all', array(
                'conditions' => array(
                    ' CONCAT( "Proyecto"."siglas", "Proyecto"."etapa") LIKE '=> '%'.strtoupper($this->request->query['term']).'%'
		),
		'fields' => array('Proyecto.id','Proyecto.siglas','Proyecto.etapa')
	));
        $this->set(compact('proyectos'));
        $this->layout = 'ajax';
    }
}
