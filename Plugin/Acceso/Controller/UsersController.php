<?php
App::uses('AccesoAppController', 'Acceso.Controller');
/**
 * Usuarios Controller
 */
class UsersController extends AccesoAppController {
    
/**
 * Components
 *
 * @var array
 */
    public $components = array('Session', 'Flash');
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'edit' ,'logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $usuarios = $this->User->find('all', ['order'=>'User.usuario ASC']);
        $this->set(compact('usuarios'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            //Clave inicial es igual al usuario
            $this->request->data['User']['clave'] = $this->request->data['User']['usuario'];
            $dsUsu = $this->User->getDataSource();
            $this->User->create();
            $dsUsu->begin();
            if ($this->User->saveAll($this->request->data)) {
                $dsUsu->commit();
                $this->Session->setFlash('Usuario creado');
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash('No se pudo crear Usuario. Intente nuevamente.');
                $dsUsu->rollback();
            }
        }
        $areas = $this->User->Area->find('list', array('fields' => array('id', 'codigo'), 'conditions' => array('Area.estado' => TRUE)));
        $grupos = $this->User->Grupo->find('list', array('fields'=>array('id','nombre'),'conditions'=> array('Grupo.estado' => TRUE)));
	$this->set(compact('grupos', 'areas'));
    }
    
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        if ($this->request->is(array('post', 'put'))){
            if($this->request->data['User']['clave1'] !== ''){$this->request->data['User']['clave'] = $this->request->data['User']['clave1'];}
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Datos actualizados.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Datos no actualizados, intente nuevamente.'));
            }
        } else {
            $this->request->data = $this->User->find('first',array('conditions' => array('User.id' => $id)));
        }
        $areas = $this->User->Area->find('list', array('fields' => array('id', 'codigo'), 'conditions' => array('Area.estado' => TRUE)));
        $grupos = $this->User->Grupo->find('list', array('fields'=>array('id','nombre'),'conditions'=> array('Grupo.estado' => TRUE)));
	$this->set(compact('grupos', 'areas'));
    }
    
    public function resetPassword($id = null){
		$this->User->recursive = -1;
		$this->User->id = $id;
		$usuario = $this->User->read(); 
                $usuario['User']['clave'] = $usuario['User']['usuario'];
		if($this->User->save($usuario)){
			$this->layout = 'ajax';
			$this->set('result','Cambiado');
		} else {
			$this->layout = 'ajax';
			$this->set('result','No se pudo cambiar');
		}
    }
    
    public function verificaUsuario($username = NULL){
		$result = $this->User->find('all',array('conditions'=>array('usuario LIKE ' => $username)));
		if($result !== array()){
			$respuesta = 'Usuario no disponible.';
			$ok = false;
			$this->set(compact('respuesta','ok'));
			$this->layout = 'ajax';
		} else {
			$respuesta = 'Usuario disponible';
			$ok = true;
			$this->set(compact('respuesta','ok'));
			$this->layout = 'ajax';
		} 
    }
    
    public function login() {
        $this->layout = 'login_new';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Usuario o clave invalida.'));
        }
        
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }
    
}
