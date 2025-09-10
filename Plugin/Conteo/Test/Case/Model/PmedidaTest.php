<?php
App::uses('Pmedida', 'Conteo.Model');

/**
 * Pmedida Test Case
 */
class PmedidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.conteo.pmedida'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pmedida = ClassRegistry::init('Conteo.Pmedida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pmedida);

		parent::tearDown();
	}

}
