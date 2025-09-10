<?php

App::uses('IncidenciaAppController', 'Incidencia.Controller');

class ReportesController extends IncidenciaAppController {

    public $components = array('Session', 'Flash');
    
    public $uses = array('Incidencia.Ticket');
    
    public function index() {
        if($this->request->is(array('post','put'))){
            $tickets = $this->Ticket->reporte_fechas($this->request->data);
            $this->set(compact('tickets'));
            $this->layout = 'ajax';
            $this->render('index_xls');
            //return $this->redirect(array('action' => 'diario'));
        }
    }

    public function reporte_estado($tiempo){
        $this->autoRender = false;
        return $this->Ticket->reporte_estado($tiempo);
    }
}
