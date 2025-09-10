<?php
App::uses('Parking', 'Parqueo.Model');

/**
 * Parking Test Case
 */
class ParkingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.parqueo.parking',
		'plugin.parqueo.lot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Parking = ClassRegistry::init('Parqueo.Parking');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parking);

		parent::tearDown();
	}

}
