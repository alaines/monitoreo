<?php
App::uses('Administradore', 'Intersecciones.Model');

/**
 * Administradore Test Case
 */
class AdministradoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.intersecciones.administradore',
		'plugin.intersecciones.cruce'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Administradore = ClassRegistry::init('Intersecciones.Administradore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Administradore);

		parent::tearDown();
	}

}
