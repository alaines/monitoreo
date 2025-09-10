<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array('Js'=>['Jquery'], 'Html', 'Form', 'Session', 'Fecha');
    public $components = array(
        'RequestHandler',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Acceso.User',
                    'fields' => array(
                        'username' => 'usuario',
                        'password' => 'clave'
                        ),
                    'scope' => array('User.estado' => TRUE),
                    'passwordHasher' => array(
                        'className' => 'Md5',
                    )
                )
            )
        )
       );
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('title_for_layout','GMU - DMC v0.1');
        $this->inicializarAuth();
    }
    function inicializarAuth(){
        $this->Auth->loginAction = array('plugin' => 'acceso','controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('plugin' => null,'controller' => 'pages', 'action' => 'home');
        //$this->Auth->loginRedirect = array('plugin' => 'acceso','controller' => 'usuarios', 'action' => 'verifyLogin');
        $this->Auth->logoutRedirect = array('plugin' => 'acceso','controller' => 'users', 'action' => 'login');
        $this->Auth->loginError = 'El nombre de usuario y/o la contrasena no son correctos. Por favor, inténtalo otra vez';
        $this->Auth->authError = 'No ha ingresado al sistema.';
        $this->Auth->allow(array('display','add'));
        $this->Session->write('Auth.redirect', null);
    }
}
