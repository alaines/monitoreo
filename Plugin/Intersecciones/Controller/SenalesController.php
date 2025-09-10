<?php
App::uses('InterseccionesAppController', 'Intersecciones.Controller');
/**
 * Senales Controller
 *
 * @property Senale $Senale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SenalesController extends InterseccionesAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

}
