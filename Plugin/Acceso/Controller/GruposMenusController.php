<?php
App::uses('AccesoAppController', 'Acceso.Controller');

class GruposMenusController extends AccesoAppController {

	public function add($id = null) {
            if ($this->request->is('post')) {
                $notice = false;
                foreach ($this->request->data as $datos){
                    if (!isset($datos['menu_id']) && isset($datos['id'])) {
                        $this->GruposMenu->id = $datos['id'];
                        if($this->GruposMenu->delete()) {
                            $notice = true;
                        }
                    } 
                    if(isset($datos['menu_id']) && !isset($datos['id'])){
			$this->GruposMenu->create();
			if($this->GruposMenu->save($datos)){
                            $notice = true;
			} 
                    }
                }
				
                if ($notice) {
				$this->Session->setFlash(__('Se grabó opciones de menu correctamente.'));
				return $this->redirect(array('controller'=>'Grupos','action' => 'add'));
                } else {
				$this->Session->setFlash(__('No se pudo grabar. Intentelo otra vez.'));
                }
            }
            $grupo = $this->GruposMenu->Grupo->find('first', array('conditions' => array('Grupo.id' => $id),'fields'=>array('Grupo.id','Grupo.nombre')));
            $lista = $this->GruposMenu->find('list', array('fields'=>array('menu_id','GruposMenu.id'),'conditions'=>array('grupo_id'=>$id),'recursive'=>-1));
            $menus = $this->GruposMenu->Menu->find('threaded',['recursive' => -1,'conditions' => ['Menu.estado' => 1], 'order' => 'Menu.lft ASC']);
            $this->set(compact('menus','grupo','lista'));
	}
	
	public function generar($id = NULL) {
            $listado = $this->GruposMenu->find('all', array('conditions'=>['GruposMenu.grupo_id' => $id], 'order' => 'Menu.lft ASC'));
           
            foreach ($listado as $lista){
                $menus[] = $lista['Menu'];
            }
            
            foreach ($menus as $menu){
                if ($menu['parent_id'] === '' || $menu['parent_id'] === null){
                    $cabeceras[] = $menu;
		}
            }
		
            foreach ($cabeceras as $c){
                foreach ($menus as $m){
                    if ($c['id'] == $m['parent_id']) {
                        $subCabeceras[] = $m;
                    }
                }
            }
		
            foreach ($subCabeceras as $sub){
                foreach ($menus as $m){
                    if ($sub['id'] == $m['parent_id']) {
                        $items[] = $m;
                    }
                }
            }

            $this->autoRender = false;
            return array('cabeceras'=>$cabeceras,'subcabeceras'=>$subCabeceras,'items'=>$items);
	}

}