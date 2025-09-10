<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Cruces Controller
 *
 * @property Cruce $Cruce
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CrucesController extends InterseccionesAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
        
        public $uses = array('Intersecciones.Cruce','Intersecciones.Tipo','Intersecciones.Eje');

/**
 * index method
 *
 * @return void
 */
	public function index() {
                $cruces= $this->Cruce->find('all');
		$this->set(compact('cruces'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cruce->exists($id)) {
			throw new NotFoundException(__('Invalid cruce'));
		}
		$options = array('conditions' => array('Cruce.' . $this->Cruce->primaryKey => $id));
		$this->set('cruce', $this->Cruce->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                        $this->Cruce->create();
                        $tmp_dwg = $this->data['Cruce']['plano_dwg']['tmp_name'];
                        $tmp_pdf = $this->data['Cruce']['plano_pdf']['tmp_name'];
                        $this->request->data['Cruce']['plano_dwg'] = $this->_genera_nombre($this->data['Cruce']['plano_dwg']);
                        $this->request->data['Cruce']['plano_pdf'] = $this->_genera_nombre($this->data['Cruce']['plano_pdf']);
                        $this->request->data['Cruce']['nombre'] = $this->data['Eje']['txt1'].' - '.$this->data['Eje']['txt2'];
			if ($this->Cruce->save($this->request->data)) {
                            $this->_asignaCodigo($this->Cruce->id,$this->data);
                            if($tmp_dwg != ''){move_uploaded_file($tmp_dwg,'files/planos/dwg/'.$this->request->data['Cruce']['plano_dwg']);}
                            if($tmp_pdf != ''){move_uploaded_file($tmp_pdf,'files/planos/pdf/'.$this->request->data['Cruce']['plano_pdf']);}
                            $this->Flash->success(__('Datos grabados correctamente.'));
                            return $this->redirect(array('action' => 'index'));
			} else {
                            $this->Flash->error(__('Datos NO grabados. Intente nuevamente.'));
			}
		}
                $tipo_gestion = $this->Tipo->listarTipos('gestion');
                $tipo_control = $this->Tipo->listarTipos('control');
                $tipo_comunicacion = $this->Tipo->listarTipos('comunicacion');
                $tipo_cruce = $this->Tipo->listarTipos('cruce');
                $tipo_estructura = $this->Tipo->listarTipos('estructura');
                $tipo_operacion = $this->Tipo->listarTipos('operacion');
		$ubigeos = $this->Cruce->Ubigeo->find('list');
		$administradores = $this->Cruce->Administradore->find('list',['conditions'=>['estado' => true ],'order'=>'nombre ASC']);
		$proyectos = $this->Cruce->Proyecto->find('list',['fields' => ['id','nombre'],'conditions'=>['estado' => true ]]);
		$this->set(compact('ubigeos', 'administradores', 'proyectos', 'tipo_gestion','tipo_control','tipo_comunicacion','tipo_cruce','tipo_estructura','tipo_operacion'));
	}
        
        private function _asignaCodigo($id,$datos) {
            $num = $this->Cruce->find('count',['conditions'=>['ubigeo_id' => $datos['Cruce']['ubigeo_id']]]);
            $this->Cruce->id = $id;
            $data['Cruce']['codigo'] = 'C'.substr($datos['Cruce']['ubigeo_id'], -2).str_pad((string)$num, 3, "0", STR_PAD_LEFT);
            $this->Cruce->save($data);
        }
        
        private function _genera_nombre($data) {
            if($data['error'] == 0){
                $ext = substr($data['name'],-3);
                $name = str_replace([' ','.','-',','], '_', substr($data['name'],0,-4));
                $nombre = $name.'.'.$ext;
            } else {
                $nombre = '';
            }
            return $nombre;
        }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cruce->exists($id)) {
			throw new NotFoundException(__('No existe intersección'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $pdf = 0;
                    $dwg = 0;
                    $this->request->data['Cruce']['nombre'] = $this->data['Eje']['txt1'].' - '.$this->data['Eje']['txt2'];
                    if($this->request->data['Cruce']['plano_pdf_edit']['error'] == 0){
                        $tmp_pdf = $this->data['Cruce']['plano_pdf_edit']['tmp_name'];
                        $this->request->data['Cruce']['plano_pdf'] = $this->_genera_nombre($this->data['Cruce']['plano_pdf_edit']);
                        $pdf = 1;
                    }
                    if($this->request->data['Cruce']['plano_dwg_edit']['error'] == 0){
                        $tmp_dwg = $this->data['Cruce']['plano_dwg_edit']['tmp_name'];
                        $this->request->data['Cruce']['plano_dwg'] = $this->_genera_nombre($this->data['Cruce']['plano_dwg_edit']);
                        $dwg = 1;
                    }
                        if ($this->Cruce->save($this->request->data)) {
                            if($this->request->data['Cruce']['ubigeo_cruce'] != $this->request->data['Cruce']['ubigeo_id']){$this->_asignaCodigo($this->Cruce->id,$this->data);}
                            if($dwg == 1){move_uploaded_file($tmp_dwg,'files/planos/dwg/'.$this->request->data['Cruce']['plano_dwg']);}
                            if($pdf == 1){move_uploaded_file($tmp_pdf,'files/planos/pdf/'.$this->request->data['Cruce']['plano_pdf']);}
                            $this->Flash->success(__('Datos modificados correctamente.'));
                            return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Datos NO modificados. Intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Cruce.' . $this->Cruce->primaryKey => $id));
			$this->request->data = $this->Cruce->find('first', $options);
                        $ubigeo_actual = $this->request->data['Cruce']['ubigeo_id'];
		}
                $vias = $this->Eje->find('all',['fields'=>['nombre_via'],'conditions'=>['id' =>[$this->data['Cruce']['via1'],$this->data['Cruce']['via2']]]]);
		$tipo_gestion = $this->Tipo->listarTipos('gestion');
                $tipo_control = $this->Tipo->listarTipos('control');
                $tipo_comunicacion = $this->Tipo->listarTipos('comunicacion');
                $tipo_cruce = $this->Tipo->listarTipos('cruce');
                $tipo_estructura = $this->Tipo->listarTipos('estructura');
                $tipo_operacion = $this->Tipo->listarTipos('operacion');
		$ubigeos = $this->Cruce->Ubigeo->find('list');
		$administradores = $this->Cruce->Administradore->find('list',['conditions'=>['estado' => true ],'order'=>'nombre ASC']);
		$proyectos = $this->Cruce->Proyecto->find('list',['fields' => ['id','nombre'],'conditions'=>['estado' => true ]]);
		$this->set(compact('ubigeos','ubigeo_actual', 'administradores', 'proyectos', 'tipo_gestion','tipo_control','tipo_comunicacion','tipo_cruce','tipo_estructura','tipo_operacion','vias'));
	}
        

        
        public function autoCompletado() {
            $this->Cruce->recursive = -1;
            $cruces = $this->Cruce->find('all', array(
                    'conditions' => array(
                        ' CONCAT( "Cruce"."codigo", "Cruce"."nombre") LIKE '=> '%'.strtoupper($this->request->query['term']).'%'
                    ),
                    'fields' => array('Cruce.id','Cruce.nombre','Cruce.codigo')
            ));
            $this->set(compact('cruces'));
            $this->layout = 'ajax';
        }
        
        public function perifericos($id = null) {
            if (!$this->Cruce->exists($id)) {
                throw new NotFoundException(__('No existe intersección'));
            }
            $tipo_perifericos = $this->Tipo->listarTipos('periferico');
            $options = array('conditions' => array('Cruce.' . $this->Cruce->primaryKey => $id));
            $cruce = $this->Cruce->find('first', $options);
            $this->set(compact('cruce','tipo_perifericos'));
        }
        
        function busqueda() {
            $ubigeos = $this->Cruce->Ubigeo->find('list');
            $tipo_comunicacion = $this->Tipo->listarTipos('comunicacion');
            $administradores = $this->Cruce->Administradore->find('list',['conditions'=>['estado' => true ],'order'=>'nombre ASC']);
            $proyectos = $this->Cruce->Proyecto->find('list',['fields' => ['id','nombre'],'conditions'=>['estado' => true ]]);
            $this->set(compact('ubigeos','tipo_comunicacion','administradores','proyectos'));
        }
        
        public function resultAjax(){
            if ($this->request->is(array('post'))) {
                $cruces = $this->Cruce->consulta($this->request->data);
                $this->set(compact('cruces'));
            } else {
                $cruces = $this->Cruce->consulta();
                $this->set(compact('cruces'));
            }
        }
        
        public function resultXls(){
            if ($this->request->is(array('post'))) {
                $cruces = unserialize($this->request->data);
                $this->set(compact('cruces'));
            }
        }
}
