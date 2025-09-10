<?php
/**
 * Lot Fixture
 */
class LotFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null),
		'latitude' => array('type' => 'decimal', 'null' => false, 'default' => null),
		'longitude' => array('type' => 'decimal', 'null' => false, 'default' => null),
		'state' => array('type' => 'boolean', 'null' => true, 'default' => true),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'createdAt' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updatedAt' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'parking_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'code' => 'Lorem ipsum dolor sit amet',
			'latitude' => '',
			'longitude' => '',
			'state' => 1,
			'created' => '2024-10-03 18:32:20',
			'modified' => '2024-10-03 18:32:20',
			'createdAt' => '2024-10-03 18:32:20',
			'updatedAt' => '2024-10-03 18:32:20',
			'parking_id' => 1
		),
	);

}
