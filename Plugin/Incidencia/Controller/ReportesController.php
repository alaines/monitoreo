<?php

App::uses('IncidenciaAppController', 'Incidencia.Controller');

class ReportesController extends IncidenciaAppController {

    public $components = array('Session', 'Flash');
    
    public $uses = array('Incidencia.Ticket','Incidencia.Reporte');
    
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

    public function buscar(){
        $incidencias = $this->Ticket->Incidencia->find('list', array('fields' => array('id', 'tipo'), 'conditions' => array('Incidencia.parent_id' => null)));
        $prioridades = $this->Ticket->Prioridade->find('list', array('fields' => array('id', 'nombre')));
        $reportadores = $this->Ticket->Reportadore->find('list', array('fields' => array('id', 'nombre')));
        $equipos = $this->Ticket->Equipo->find('list', array('fields' => array('id', 'nombre'), 'conditions' => array('estado' => TRUE)));
        $estados = $this->Ticket->Estado->find('list',array('fields' => array('id', 'nombre')));
        $this->set(compact('incidencias','prioridades','equipos','reportadores','estados'));
    }

    public function resultAjax(){
        if ($this->request->is(array('post'))) {
            $tickets = $this->Reporte->busqueda($this->request->data);
            $this->set(compact('tickets'));
        } else {
            $tickets = $this->Reporte->busqueda();
            $this->set(compact('tickets'));
        }
    }
    
    public function resultXls(){
        if ($this->request->is(array('post'))) {
            $tickets = unserialize($this->request->data);
            $this->set(compact('tickets'));
        }
    }

}