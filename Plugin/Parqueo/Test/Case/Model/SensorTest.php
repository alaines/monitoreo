<?php
App::uses('Sensor', 'Parqueo.Model');

/**
 * Sensor Test Case
 */
class SensorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.parqueo.sensor',
		'plugin.parqueo.lot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sensor = ClassRegistry::init('Parqueo.Sensor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sensor);

		parent::tearDown();
	}

}
