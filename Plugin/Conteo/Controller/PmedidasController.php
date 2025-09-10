<?php
App::uses('ConteoAppController', 'Conteo.Controller');
/**
 * Pmedidas Controller
 */
class PmedidasController extends ConteoAppController {

    public function autoCompletado() {
        $this->Pmedida->recursive = -1;
        $pmedidas = $this->Pmedida->find('all', array(
                'conditions' => array(
                    ' CONCAT( "Pmedida"."numero", "Pmedida"."descripcion") LIKE '=> '%'.strtoupper($this->request->query['term']).'%'
		),
		'fields' => array('Pmedida.id','Pmedida.numero','Pmedida.descripcion')
	));
        $this->set(compact('pmedidas'));
        $this->layout = 'ajax';
    }

}
