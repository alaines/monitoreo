<?php
App::uses('IncidenciaAppModel', 'Incidencia.Model');
/**
 * Ticket Model
 *
 * @property Incidencia $Incidencia
 * @property Prioridade $Prioridade
 * @property Cruce $Cruce
 * @property Equipo $Equipo
 * @property Estado $Estado
 * @property Reportadore $Reportadore
 * @property TicketSeguimiento $TicketSeguimiento
 */
class Ticket extends IncidenciaAppModel {

    public $actAs = array('AuditLog.Auditable');

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Incidencia' => array(
			'className' => 'Incidencia.Incidencia',
			'foreignKey' => 'incidencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prioridade' => array(
			'className' => 'Incidencia.Prioridade',
			'foreignKey' => 'prioridade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cruce' => array(
			'className' => 'Intersecciones.Cruce',
			'foreignKey' => 'cruce_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Equipo' => array(
			'className' => 'Incidencia.Equipo',
			'foreignKey' => 'equipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estado' => array(
			'className' => 'Incidencia.Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Reportadore' => array(
			'className' => 'Incidencia.Reportadore',
			'foreignKey' => 'reportadore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'TicketSeguimiento' => array(
			'className' => 'Incidencia.TicketSeguimiento',
			'foreignKey' => 'ticket_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'TicketSeguimiento.created',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
    public function beforeSave($option = array()){
        parent::beforeSave();
        if (!empty($this->data['Ticket']['descripcion'])) {
            $this->data['Ticket']['descripcion'] = strtoupper($this->data['Ticket']['descripcion']);
        }
        return true;
    }
    
    public function consulta($data = null){
        $this->Behaviors->load('Containable');
        $conditions = array();
        $limit = '';
        if($data != null){
            $data['filas'] <> '' ? $limit = (int) $data['filas'] : $limit = 10;
            if((int) $data['incidencia_nombre'] <> 0){$conditions['Incidencia.parent_id'] = (int) $data['incidencia_nombre'];}
            if((int) $data['incidencia_tipo'] <> 0){$conditions['incidencia_id'] = (int) $data['incidencia_tipo'];}
            if((int) $data['prioridade_id'] <> 0){$conditions['Ticket.prioridade_id'] = (int) $data['prioridade_id'];}
            if((int) $data['estado_id'] <> 0){$conditions['estado_id'] = (int) $data['estado_id'];}
            if((int) $data['cruce_id'] <> 0){$conditions['cruce_id'] = (int) $data['cruce_id'];}
            if((int) $data['equipo_id'] <> 0){$conditions['equipo_id'] = (int) $data['equipo_id'];}
            if((int) $data['reportadore_id'] <> 0){$conditions['reportadore_id'] = (int) $data['reportadore_id'];}
            if($data['fecha1'] <> '' AND $data['fecha2'] == ''){
                $fecha1 = new DateTime($data['fecha1']);
                $fecha_act = new DateTime();
                $conditions['Ticket.created BETWEEN ? AND ?'] = array($fecha1->format('Y-m-d').' 00:00:00', $fecha_act->format('Y-m-d H:i:s'));
            }elseif($data['fecha1'] == '' AND $data['fecha2'] <> ''){
                $fecha2 = new DateTime($data['fecha2']);
                $conditions['Ticket.created <'] = $fecha2->format('Y-m-d').' 23:59:59';
            }elseif($data['fecha1'] == '' AND $data['fecha2'] == ''){
                $fecha_act = new DateTime();
                $conditions['Ticket.created <'] = $fecha_act->format('Y-m-d H:i:s');
            } elseif($data['fecha1'] <> '' AND $data['fecha2'] <> ''){
                $conditions['CAST(Ticket.created AS date) BETWEEN ? AND ?'] = array($data['fecha1'], $data['fecha2']);
            }
        }
        $this->contain(array('Equipo'=>array('fields' => array('id','nombre')), 'Estado', 'Cruce' => array('Proyecto','Administradore','Ubigeo'), 'Prioridade','Incidencia'=>array('ParentIncidencia'), 'Reportadore'));
        $result = $this->find('all', array('conditions' => $conditions,'order' =>array('Ticket.estado_id','Ticket.created DESC'), 'limit' => $limit));
        return $result;
    }
    
    public function reporte_fechas($data = null){
        $this->Behaviors->load('Containable');
        if($data['Reporte']['fecha1'] <> '' AND $data['Reporte']['fecha2'] == ''){
            $fecha1 = new DateTime($data['Reporte']['fecha1']);
            $fecha2 = $fecha1->format('Y-m-d').' 23:59:59';
            $conditions['Ticket.created BETWEEN ? AND ?'] = array($fecha1->format('Y-m-d H:i:s'), $fecha2);
        } elseif($data['Reporte']['fecha1'] <> '' AND $data['Reporte']['fecha2'] <> '') {
            $fecha1 = new DateTime($data['Reporte']['fecha1']);
            $f2 = new DateTime($data['Reporte']['fecha2']);
            $fecha2 = $f2->format('Y-m-d').' 23:59:59';
            $conditions['Ticket.created BETWEEN ? AND ?'] = array($fecha1->format('Y-m-d H:i:s'), $fecha2);
        } else {
            $fecha = new DateTime();
            $fecha->format('Y-m-d H:i:s');
            $conditions['Ticket.created <'] = $fecha->format('Y-m-d H:i:s');
        }
        
        $this->contain(array('Equipo'=>array('fields' => array('id','nombre')), 'Estado', 'Cruce' => array('Administradore','Ubigeo'), 'Prioridade','Incidencia'=>array('ParentIncidencia'), 'Reportadore'));
        $result = $this->find('all', array('conditions' => $conditions,'order' =>array('Ticket.created ASC')));
        return $result;
    }
    
    public function reporte_estado($tiempo){
        $condicion = 'AND t.created::date = current_date;';
        if($tiempo == 'ant'){$condicion = 'AND t.created::date < current_date;';}
        $query = "SELECT 
                    SUM(CASE WHEN (t.estado_id = 1 OR t.estado_id = 2 OR t.estado_id = 5) THEN 1 ELSE 0 END) AS pendientes,
                    SUM(CASE WHEN (t.estado_id = 4) THEN 1 ELSE 0 END) AS atendidas
                  FROM 
                  	public.tickets as t
                        INNER JOIN
                        public.incidencias
                        ON 
                        t.incidencia_id = incidencias.id 
                  WHERE
                    incidencias.caracteristica = 'I' ".$condicion;
        $data = $this->query($query);
        return $data[0];
    }
    
}

