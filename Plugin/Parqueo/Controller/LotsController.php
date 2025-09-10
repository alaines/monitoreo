<?php
App::uses('ParqueoAppController', 'Parqueo.Controller');
/**
 * Lots Controller
 *
 * @property Lot $Lot
 * @property PaginatorComponent $Paginator
 */
class LotsController extends ParqueoAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Session','Paginator', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lot->recursive = 0;
		$this->set('lots', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lot->exists($id)) {
			throw new NotFoundException(__('Invalid lot'));
		}
		$options = array('conditions' => array('Lot.' . $this->Lot->primaryKey => $id));
		$this->set('lot', $this->Lot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lot->create();
			if ($this->Lot->save($this->request->data)) {
				$this->Flash->success(__('The lot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The lot could not be saved. Please, try again.'));
			}
		}
		$parkings = $this->Lot->Parking->find('list');
		$this->set(compact('parkings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lot->exists($id)) {
			throw new NotFoundException(__('Invalid lot'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lot->save($this->request->data)) {
				$this->Flash->success(__('The lot has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The lot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lot.' . $this->Lot->primaryKey => $id));
			$this->request->data = $this->Lot->find('first', $options);
		}
		$parkings = $this->Lot->Parking->find('list');
		$this->set(compact('parkings'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Lot->exists($id)) {
			throw new NotFoundException(__('Invalid lot'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Lot->delete($id)) {
			$this->Flash->success(__('The lot has been deleted.'));
		} else {
			$this->Flash->error(__('The lot could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function mapa() {
		App::uses('CakeTime', 'Utility');
		$this->Lot->recursive = -1;
		$lots = $this->Lot->find('all', ['fields' => ['Lot.id','Lot.code','Lot.latitude','Lot.longitude','Lot.parking_id'],'conditions'=>['Lot.state' => true],'order' => ['Lot.id'=>'desc']]);
		foreach ($lots as $l) {
			$lotLastMovementState = $this->Lot->Movement->lastMovementState($l['Lot']['id']);
			$lotsLastState[] = ['id' => $l['Lot']['id'],'code' => $l['Lot']['code'],'lat' => $l['Lot']['latitude'],'lng' => $l['Lot']['longitude'],'parking_id' => $l['Lot']['parking_id'],'lastState' => $lotLastMovementState['Movement']['state'],'lastStateCreated' => CakeTime::niceShort($lotLastMovementState['Movement']['created']) ];
		}
		$this->set(compact('lotsLastState'));
		$this->set('_serialize', ['lotsLastState']);
	}

}