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
class Reporte extends IncidenciaAppModel { 

    //public $useTable = 'public.reporte_total';

    public function busqueda($data = null){
        $conditions = array();
        $limit = '';
        if($data != null){
            $data['filas'] <> '' ? $limit = (int) $data['filas'] : $limit = 10;
            if((int) $data['incidencia_nombre'] <> 0){$conditions['Reporte.Tipo_id'] = (int) $data['incidencia_nombre'];}
            if((int) $data['incidencia_tipo'] <> 0){$conditions['Reporte.Incidencia_id'] = (int) $data['incidencia_tipo'];}
            if((int) $data['prioridade_id'] <> 0){$conditions['Reporte.Prioridad_id'] = (int) $data['prioridade_id'];}
            if((int) $data['estado_id'] <> 0){$conditions['Reporte.Estado_id'] = (int) $data['estado_id'];}
            if((int) $data['cruce_id'] <> 0){$conditions['Reporte.Cruce_id'] = (int) $data['cruce_id'];}
            if((int) $data['equipo_id'] <> 0){$conditions['Reporte.Equipo_id'] = (int) $data['equipo_id'];}
            if((int) $data['reportadore_id'] <> 0){$conditions['Reporte.reportador'] = (int) $data['reportadore_id'];}
            if($data['fecha1'] <> '' AND $data['fecha2'] == ''){
                $fecha1 = new DateTime($data['fecha1']);
                $fecha_act = new DateTime();
                $conditions['Reporte.Fecha_registro BETWEEN ? AND ?'] = array($fecha1->format('Y-m-d').' 00:00:00', $fecha_act->format('Y-m-d H:i:s'));
            }elseif($data['fecha1'] == '' AND $data['fecha2'] <> ''){
                $fecha2 = new DateTime($data['fecha2']);
                $conditions['Reporte.Fecha_registro <'] = $fecha2->format('Y-m-d').' 23:59:59';
            }elseif($data['fecha1'] == '' AND $data['fecha2'] == ''){
                $fecha_act = new DateTime();
                $conditions['Reporte.Fecha_registro <'] = $fecha_act->format('Y-m-d H:i:s');
            } elseif($data['fecha1'] <> '' AND $data['fecha2'] <> ''){
                $conditions['CAST(Reporte.Fecha_registro AS date) BETWEEN ? AND ?'] = array($data['fecha1'], $data['fecha2']);
            }
        }
        $result = $this->find('all', array('conditions' => $conditions,'order' =>array('Reporte.Ticket','Reporte.Fecha_registro DESC'), 'limit' => $limit));
        return $result;
    }


}