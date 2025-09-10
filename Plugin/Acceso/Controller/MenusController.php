<?php
App::uses('AccesoAppController', 'Acceso.Controller');

class MenusController extends AccesoAppController {
    
    public $uses = array('Acceso.Menu', 'Acceso.Padre');
    
    public function index() {
        $categories = $this->Menu->find('threaded',['recursive' => -1, 'conditions' => ['estado' => 1], 'order' => 'lft ASC']);     
        $this->set(compact('categories'));
    }
	
    public function add() {
        if ($this->request->is('post','put')) {
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('Opcion guardada correctamente'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('Ocurrio un error intentelo nuevamente.'));
			}
		}
        $categories = $this->Menu->find('threaded',['recursive' => -1, 'conditions' => ['estado' => 1], 'order' => 'lft ASC']);
        $_menus = $this->Padre->find('all');
        $menus = $this->Menu->find('list',['conditions' => ['OR' => ['url' => '', 'url' => null]],'fields'=>['id','name'], 'order' => ['lft' => 'ASC']]);
        $this->set(compact('menus','categories','_menus'));
    }
	
    public function delete($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundExcepcion('Opcion inválida');
        }
	if($id > 0){
            $this->Menu->GruposMenu->deleteAll(['menu_id' => $id]);
            $this->Menu->removeFromTree($id, true);
        } else {
            $this->Session->setFlash('Verifique el id de Menu');
        }
        return $this->redirect(['action' => 'add']);
    }

    public function movedown($id = null, $delta = null) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
           throw new NotFoundException(__('Invalid category'));
        }
        if ($delta > 0) {
            $this->Menu->moveDown($this->Category->id, abs($delta));
        } else {
            $this->Session->setFlash(
              'Please provide the number of positions the field should be' .
              'moved down.'
            );
        }
        return $this->redirect(array('action' => 'add'));
    }
    
    public function moveup($id = null, $delta = null) {
        $this->Menu->id = $id;
        if (!$this->Menu->exists()) {
           throw new NotFoundException(__('Invalid category'));
        }
        if ($delta > 0) {
            $this->Menu->moveUp($this->Category->id, abs($delta));
        } else {
            $this->Session->setFlash(
              'Please provide a number of positions the category should' .
              'be moved up.'
            );
        }
        return $this->redirect(array('action' => 'add'));
    }

    public function edit($id = null) {
        if (!$this->Menu->exists($id)) {
            throw new NotFoundException('Menu inválido');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__('Se editó el Menu correctamente.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('No se pudo editar. Intentelo otra vez.'));
            }
        } else {
            $options = array('recursive' => -1,'conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
            $this->request->data = $this->Menu->find('first', $options);
        }
    }
}