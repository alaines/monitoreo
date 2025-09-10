<?php
App::uses('Movement', 'Parqueo.Model');

/**
 * Movement Test Case
 */
class MovementTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.parqueo.movement',
		'plugin.parqueo.lot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Movement = ClassRegistry::init('Parqueo.Movement');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Movement);

		parent::tearDown();
	}

}
