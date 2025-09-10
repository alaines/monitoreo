<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');

class TicketSeguimientosController extends IncidenciaAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
        
        public function add($id =  null) {
            if ($this->request->is('post')) {
                $this->request->data['Ticket']['estado_id'] = $this->request->data['TicketSeguimiento']['estado_id'];
                $this->TicketSeguimiento->create();
                    if ($this->TicketSeguimiento->saveAll($this->request->data)) {
                        $this->Flash->success(__('Datos grabados correctamente.'));
                        return $this->redirect(array('controller' => 'tickets','action' => 'index'));
                    } else {
                        $this->Flash->error(__('No se pudo grabar.'));
                    }
            }
            $this->TicketSeguimiento->Ticket->recursive = -1;
            $this->TicketSeguimiento->Ticket->Behaviors->load('Containable');
            $this->TicketSeguimiento->Ticket->contain(array('Equipo'=>array('fields' => array('id','nombre')), 'Estado', 'Cruce'=>'Periferico', 'Prioridade','Incidencia'=>array('ParentIncidencia'), 'Reportadore'));
            $tickets = $this->TicketSeguimiento->Ticket->find('first',array('conditions' => array('Ticket.id' => $id)));
            $estados = $this->TicketSeguimiento->Estado->find('list', array('fields' => array('Estado.id', 'Estado.nombre')));
            $equipos = $this->TicketSeguimiento->Equipo->find('list', array('fields' => array('Equipo.id', 'Equipo.nombre'), 'conditions' => array('Equipo.estado' => TRUE)));
            $this->set(compact('tickets', 'estados', 'equipos'));
        }
        
        public function edit($id = null) { 
            if (!$this->TicketSeguimiento->exists($id)) {
                throw new NotFoundException(__('Seguimiento invalido'));
            }
            if ($this->request->is(array('post', 'put'))) {
                $this->request->data['Ticket']['estado_id'] = $this->request->data['TicketSeguimiento']['estado_id'];
                if ($this->TicketSeguimiento->saveAll($this->request->data)) {
                    $this->Flash->success(__('El seguimiento fue editado.'));
                    return $this->redirect(array('controller' => 'tickets','action' => 'detalle', $this->request->data['Ticket']['id']));
                } else {
                    $this->Flash->error(__('No se pudo editar.'));
                }
            } else {
                $this->request->data = $this->TicketSeguimiento->find('first',array('conditions' => array('TicketSeguimiento.id' => $id)));
            }
            $this->TicketSeguimiento->recursive = -1;
            $this->TicketSeguimiento->Behaviors->load('Containable');
            $this->TicketSeguimiento->contain(array('Ticket' =>  array('Reportadore','Equipo'=>array('fields' => array('id','nombre')), 'Estado', 'Cruce', 'Prioridade','Incidencia'=>array('ParentIncidencia'))));
            $tickets = $this->TicketSeguimiento->find('first',array('conditions' => array('TicketSeguimiento.id' => $id)));
            $estados = $this->TicketSeguimiento->Estado->find('list', array('fields' => array('Estado.id', 'Estado.nombre')));
            $equipos = $this->TicketSeguimiento->Equipo->find('list', array('fields' => array('Equipo.id', 'Equipo.nombre'), 'conditions' => array('Equipo.estado' => TRUE)));
            $this->set(compact('tickets', 'estados', 'equipos'));
        }

}
