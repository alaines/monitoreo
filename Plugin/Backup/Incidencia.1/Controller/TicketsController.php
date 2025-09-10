<?php
App::uses('IncidenciaAppController', 'Incidencia.Controller');

class TicketsController extends IncidenciaAppController {

	public $components = array('Session', 'Flash','RequestHandler');

	public function index() {
            $this->Ticket->recursive = 0;
            $tickets = $this->Ticket->find('all',['order'=>['Ticket.estado_id ASC', 'Ticket.created DESC']]);
            $this->set(compact('tickets'));
	}

	public function add() {
            if ($this->request->is('post')) {
                $this->Ticket->create();
                if ($this->Ticket->save($this->request->data)) {
                    $this->Flash->success(__('Incidencia grabada.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Flash->error(__('Hubo un problema. Intente nuevamente'));
                }
            }
            $incidencias = $this->Ticket->Incidencia->find('list', array('fields' => array('id', 'tipo'), 'conditions' => array('Incidencia.parent_id' => null)));
            $reportadores = $this->Ticket->Reportadore->find('list', array('fields' => array('id', 'nombre')));
            $equipos = $this->Ticket->Equipo->find('list', array('fields' => array('id', 'nombre'), 'conditions' => array('estado' => TRUE)));
            $this->set(compact('incidencias', 'equipos','reportadores'));
	}

	public function edit($id = null) {
		if (!$this->Ticket->exists($id)) {
			throw new NotFoundException(__('Invalid ticket'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ticket->save($this->request->data)) {
				$this->Flash->success(__('Incidencia editada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Hubo un problema. Intente nuevamente'));
			}
		} else {
			$this->request->data = $this->Ticket->find('first', array('recursive' => 2,'conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id)));
                        $this->request->data['Cruce']['id'] == null  ? $dataCruce = '-' : $dataCruce = $this->request->data['Cruce']['codigo'].' - '.$this->request->data['Cruce']['nombre'];
		}
		$incidencias = $this->Ticket->Incidencia->find('list', array('fields' => array('id', 'tipo'), 'conditions' => array('Incidencia.parent_id' => null)));
		$prioridades = $this->Ticket->Prioridade->find('list');
		$equipos = $this->Ticket->Equipo->find('list');
                $reportadores = $this->Ticket->Reportadore->find('list', array('fields' => array('id', 'nombre')));
		$this->set(compact('incidencias', 'prioridades', 'equipos','reportadores','dataCruce'));
	}
        
        public function detalle($id = null){
            $this->Ticket->recursive = 2;
            $tickets = $this->Ticket->find('first',array('conditions' => array('Ticket.id' =>  $id)));
            $this->set(compact('tickets'));
        }
        
        public function search(){
            $incidencias = $this->Ticket->Incidencia->find('list', array('fields' => array('id', 'tipo'), 'conditions' => array('Incidencia.parent_id' => null)));
            $prioridades = $this->Ticket->Prioridade->find('list', array('fields' => array('id', 'nombre')));
            $reportadores = $this->Ticket->Reportadore->find('list', array('fields' => array('id', 'nombre')));
            $equipos = $this->Ticket->Equipo->find('list', array('fields' => array('id', 'nombre'), 'conditions' => array('estado' => TRUE)));
            $estados = $this->Ticket->Estado->find('list',array('fields' => array('id', 'nombre')));
            $this->set(compact('incidencias','prioridades','equipos','reportadores','estados'));
        }
        
        public function resultAjax(){
            if ($this->request->is(array('post'))) {
                $tickets = $this->Ticket->consulta($this->request->data);
                $this->set(compact('tickets'));
            } else {
                $tickets = $this->Ticket->consulta();
                $this->set(compact('tickets'));
            }
        }
        
        public function resultXls(){
            if ($this->request->is(array('post'))) {
                $tickets = unserialize($this->request->data);
                $this->set(compact('tickets'));
            }
        }
        
        public function mapa() {
            $this->Ticket->Behaviors->load('Containable');
            $this->Ticket->contain(['Incidencia.tipo','Prioridade.nombre','Cruce'=>['fields'=>['nombre','latitud','longitud'],'Administradore.nombre']]);
            $lista = $this->Ticket->find('all', ['fields'=>['Ticket.id'],'conditions'=>['Ticket.estado_id' =>[1,2,5]]]);
            foreach ($lista as $t) {
                $tickets[] = ['id'=>$t['Ticket']['id'], 'cruce'=>$t['Cruce']['nombre'], 'lat'=>$t['Cruce']['latitud'], 'lng'=>$t['Cruce']['longitud'], 'incidencia'=>$t['Incidencia']['tipo'], 'prioridade'=>$t['Prioridade']['nombre'],'capa'=>$t['Cruce']['Administradore']['nombre']];
            }
            $this->set(compact('tickets'));
            $this->set('_serialize', ['tickets']);
        }
        
}