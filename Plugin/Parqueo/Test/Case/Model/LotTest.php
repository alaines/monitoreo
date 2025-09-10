<?php
App::uses('Lot', 'Parqueo.Model');

/**
 * Lot Test Case
 */
class LotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.parqueo.lot',
		'plugin.parqueo.parking',
		'plugin.parqueo.movement',
		'plugin.parqueo.sensor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lot = ClassRegistry::init('Parqueo.Lot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lot);

		parent::tearDown();
	}

}
