<?php
App::uses('ConteoAppModel', 'Conteo.Model');
/**
 * Pmedida Model
 *
 */
class Pmedida extends ConteoAppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'conteo';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'numero' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public function anual($year) {
           $query = '';
           
           return $query;
        }
        //Calculo del volumen diario por mes por interseccion (volumen = intensidad / 4)
        public function mensual($year, $month, $code) {
           $query = 'SELECT 
               tabla.codigo AS "Conteo__codigo", 
               extract(day from tabla.fecha) AS "Conteo__dia", 
               (SUM(tabla.intensidad) / 4) AS "Conteo__volumen" 
            FROM public."C'.$month.$year.'" AS tabla 
            WHERE tabla.codigo = '.$code.' 
            GROUP BY tabla.codigo,extract(day from tabla.fecha) 
            ORDER BY codigo, extract(day from tabla.fecha);';
           return $query;
        }
        
}
