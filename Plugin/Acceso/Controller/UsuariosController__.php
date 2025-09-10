<?php
App::uses('AccesoAppController', 'Acceso.Controller');
/**
 * Usuarios Controller
 */
class UsuariosController extends AccesoAppController {
    
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
        $this->Usuario->recursive = 0;
        $usuarios = $this->Usuario->find('all', array('conditions' => array('Usuario.estado' => TRUE)));
        $this->set(compact('usuarios'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            //CLAVE inicial es igual al usuario
            $this->request->data['Usuario']['clave'] = $this->request->data['Usuario']['usuario'];
            $this->request->data['Usuario']['estado'] = TRUE;
            $this->request->data['Persona']['estado'] = TRUE;
            $dsUsu = $this->Usuario->getDataSource();
            $this->Usuario->create();
            $dsUsu->begin();
            if ($this->Usuario->saveAll($this->request->data)) {
                $dsUsu->commit();
                $this->Session->setFlash('Usuario creado');
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash('No se pudo crear Usuario. Intente nuevamente.');
                $dsUsu->rollback();
            }
        }
        $areas = $this->Usuario->Area->find('list', array('fields' => array('id', 'codigo'), 'conditions' => array('Area.estado' => TRUE)));
        $grupos = $this->Usuario->Grupo->find('list', array('fields'=>array('id','nombre'),'conditions'=> array('Grupo.estado' => TRUE)));
	$this->set(compact('grupos', 'areas'));
    }
    
    public function edit($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        if ($this->request->is(array('post', 'put'))){
            if($this->request->data['Usuario']['clave1'] !== ''){$this->request->data['Usuario']['clave'] = $this->request->data['Usuario']['clave1'];}
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('Datos actualizados.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Datos no actualizados, intente nuevamente.'));
            }
        } else {
            $this->request->data = $this->Usuario->find('first',array('conditions' => array('Usuario.id' => $id)));
        }
        $areas = $this->Usuario->Area->find('list', array('fields' => array('id', 'codigo'), 'conditions' => array('Area.estado' => TRUE)));
        $grupos = $this->Usuario->Grupo->find('list', array('fields'=>array('id','nombre'),'conditions'=> array('Grupo.estado' => TRUE)));
	$this->set(compact('grupos', 'areas'));
    }
    
    public function resetPassword($id = null){
		$this->Usuario->recursive = -1;
		$this->Usuario->id = $id;
		$usuario = $this->Usuario->read(); 
                $usuario['Usuario']['clave'] = $usuario['Usuario']['usuario'];
		if($this->Usuario->save($usuario)){
			$this->layout = 'ajax';
			$this->set('result','Cambiado');
		} else {
			$this->layout = 'ajax';
			$this->set('result','No se pudo cambiar');
		}
    }
    
    public function verificaUsuario($username = NULL){
		$result = $this->Usuario->find('all',array('conditions'=>array('usuario LIKE ' => $username)));
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
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Usuario ó clave inválida.'));
        }
        
    }

    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }
    
}
