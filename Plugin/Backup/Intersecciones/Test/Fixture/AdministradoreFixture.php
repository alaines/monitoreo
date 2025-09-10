<?php
/**
 * Administradore Fixture
 */
class AdministradoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => null),
		'reponsable' => array('type' => 'string', 'null' => true, 'default' => null),
		'telefono' => array('type' => 'integer', 'null' => true, 'default' => null),
		'email' => array('type' => 'string', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'reponsable' => 'Lorem ipsum dolor sit amet',
			'telefono' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'created' => '2021-03-01 15:33:18',
			'modified' => '2021-03-01 15:33:18'
		),
	);

}
