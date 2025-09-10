<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');

class SignalsController extends InterseccionesAppController {

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
                if(is_null($this->request->data['Signal']['parent_id']) || empty($this->request->data['Signal']['parent_id'])){
                    $this->request->data['Signal']['nivel'] = 1;
                } elseif (!empty($this->request->data['Signal']['parent_id'])) {
                    $nivel = $this->Signal->find('first',['recursive'=>-1,'conditions'=>['id'=> $this->request->data['Signal']['parent_id']], 'fields'=>['nivel']]);
                    if($nivel['Signal']['nivel'] == 1){
                        $this->request->data['Signal']['nivel'] = 2;
                    } else {
                        $this->request->data['Signal']['nivel'] = 3;
                    }
                    debug($this->request->data);
                }
                $this->Signal->create();
                if ($this->Signal->save($this->request->data)) {
                    $this->Flash->success(__('Grabado correctamente'));
                    return $this->redirect(array('action' => 'add'));
                } else {
                    $this->Flash->error(__('No se pudo grabar. Intente nuevamente.'));
                }
            }
            $tipos = $this->Signal->generateTreeList(['NOT' => ['nivel' => 3]],null,null,'__');
            $listado = $this->Signal->generateTreeList(null,null,null,'-----');
            $this->set(compact('tipos','listado'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Signal->exists($id)) {
			throw new NotFoundException(__('Invalid signal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Signal->save($this->request->data)) {
				$this->Flash->success(__('The signal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The signal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Signal.' . $this->Signal->primaryKey => $id));
			$this->request->data = $this->Signal->find('first', $options);
		}
	}

}
