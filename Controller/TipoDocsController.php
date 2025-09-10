<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP TipoDocsController
 * @author ALAND
 */
class TipoDocsController extends AppController {

    public function index() {
        
    }
    
    public function listar() {
        $listas = $this->TipoDoc->find('list',array('fields'=>array('TipoDoc.id','TipoDoc.nombre'),'conditions' => array('TipoDoc.estado' => 'TRUE'), 'recursive' => 0));
            if ($this->request->is('requested')) {
                return $listas;
            }
            $this->set('listas', $posts);
    }

}
