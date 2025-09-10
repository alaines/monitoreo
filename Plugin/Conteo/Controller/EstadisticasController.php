<?php
App::uses('ConteoAppController', 'Conteo.Controller');
/**
 * Pmedidas Controller
 */
class EstadisticasController extends ConteoAppController {

    public $uses = array('Conteo.Pmedida');
    
    public function mensual() {
        if ($this->request->is('post')) {
            $query = $this->Pmedida->mensual($this->data['Reporte']['year'],$this->data['Reporte']['month'],$this->data['Reporte']['pmedida']['numero']);
            $results = $this->Pmedida->query($query);
            $pmedida = $this->Pmedida->find('first',['conditions' => ['numero' => $this->data['Reporte']['pmedida']['numero']]]);
            $promedios = $this->_promedios($results, $this->data['Reporte']['month'], $this->data['Reporte']['year']);
            $labels = $this->_chartLabels($results);
            $dataset = $this->_chartDataset($results,$promedios);
            $colorset = $this->_chartColorBar($results, $this->data['Reporte']['month'], $this->data['Reporte']['year']);
            $legendlabels = $this->_legendLabels($results, $this->data['Reporte']['month'], $this->data['Reporte']['year']);
            $this->set(compact('results','promedios','labels','dataset','colorset','legendlabels','pmedida'));
        }
    }
    
    public function comparativoMensual(){
        if($this->request->is('post')){
            foreach ($this->data['Reporte']['year'] as $year) {
                $query = $this->Pmedida->mensual($year,$this->data['Reporte']['month'],$this->data['Reporte']['pmedida']['numero']);
                $datos[$year] = $this->Pmedida->query($query);
            }
            $results = $this->_ordenaComparativo($datos,$this->data['Reporte']['year']);
            $pmedida = $this->Pmedida->find('first',['conditions' => ['numero' => $this->data['Reporte']['pmedida']['numero']]]);
            $promedios = $this->_promedioComparativo($datos, $this->data['Reporte']['month'], $this->data['Reporte']['year']);
            $this->set(compact('results','pmedida','promedios'));
        }
    }
    
    private function _ordenaComparativo($data, $years){
        foreach ($years as $y) {
            foreach ($data[$y] as $value) {
                $results[$value['Conteo']['dia']]['dia'] = $value['Conteo']['dia'];
                $results[$value['Conteo']['dia']][$y]['volumen'] = $value['Conteo']['volumen'];
            }
        }
        return $results ;
    }
    
    private function _promedioComparativo($data, $month, $years){
        foreach ($years as $y){
            $r[$y] = $this->_promedios($data[$y], $month, $y);
            $results['Promedio']['laboral'][$y] = $r[$y]['Promedio']['laboral'];
            $results['Promedio']['sabados'][$y] = $r[$y]['Promedio']['sabados'];
            $results['Promedio']['domingos'][$y] = $r[$y]['Promedio']['domingos'];
        }
        return $results;
    }

    private function _promedios($values, $month, $year) {
        $sabados = 0; $domingos = 0; $laborales = 0; $c1 = 0; $c2 = 0; $c3 = 0;
        foreach ($values as $value) {
            $calculoDia = date("w", strtotime($value['Conteo']['dia'].'-'.$month.'-'.$year));
            if($calculoDia == 6){
                ++$c1;
                $sabados += $value['Conteo']['volumen'];
            }elseif($calculoDia == 0){
                ++$c2;
                $domingos += $value['Conteo']['volumen'];
            }else{
                ++$c3;
                $laborales += $value['Conteo']['volumen'];
            };
        }
        $result['Promedio']['laboral'] = round($laborales / $c3, 0, PHP_ROUND_HALF_UP);
        $result['Promedio']['sabados'] = round($sabados / $c1, 0, PHP_ROUND_HALF_UP);
        $result['Promedio']['domingos'] = round($domingos / $c2, 0, PHP_ROUND_HALF_UP);
        return $result;
    }
    
    private function _chartLabels($values) {
        foreach ($values as $value) {
            $labels[] = $value['Conteo']['dia'];
        }
        $labels[] = 'Prom. Lab.';
        $labels[] = 'Prom. Sab.';
        $labels[] = 'Prom. Dom.';
        return $labels;
    }
    
    private function _chartDataset($values, $averages) {
        foreach ($values as $value) {
            $dataset[] = $value['Conteo']['volumen'];
        }
        $dataset[] = $averages['Promedio']['laboral'];
        $dataset[] = $averages['Promedio']['sabados'];
        $dataset[] = $averages['Promedio']['domingos'];
        return $dataset;
    }
    
    private function _chartColorBar($values, $month, $year) {
        $cLab = 'rgba(122, 177, 218, 0.6)';
        $cSab = 'rgba(119, 211, 164, 0.6)';
        $cDom = 'rgba(255, 115, 121, 0.6)';
        $cPromLab = 'rgba(78, 198, 233, 0.6)';
        $cPromSab = 'rgba(115, 207, 142, 0.6)';
        $cPromDom = 'rgba(255, 115, 100, 0.6)';
        
        foreach ($values as $value) {
            $calculoDia = date("w", strtotime($value['Conteo']['dia'].'-'.$month.'-'.$year));
            if($calculoDia == 6){
                $colorSet[] = $cSab;
            }elseif($calculoDia == 0){
                $colorSet[] = $cDom;
            }else{
                $colorSet[] = $cLab;
            };
        }
        $colorSet[] = $cPromLab;
        $colorSet[] = $cPromSab;
        $colorSet[] = $cPromDom;
        return $colorSet;
    }
    
    private function _legendLabels($values, $month, $year) {
        foreach ($values as $value) {
            $calculoDia = date("w", strtotime($value['Conteo']['dia'].'-'.$month.'-'.$year));
            if($calculoDia == 6){
                $legendLabels[] = 'Sabado';
            }elseif($calculoDia == 0){
                $legendLabels[] = 'Domingo';
            }else{
                $legendLabels[] = 'Laboral';
            };
        }
        $legendLabels[] = 'Promedio Dias Laborales';
        $legendLabels[] = 'Promedio Sabados';
        $legendLabels[] = 'Promedio Domingos';
        return $legendLabels;
    }
}
