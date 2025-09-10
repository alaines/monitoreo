<?php
class DATABASE_CONFIG {

	public $default = array(
            'datasource' => 'Database/Postgres',
            'persistent' => false,
            'host' => 'localhost',
            'login' => 'transito',
            'password' => 'transito',
            'database' => 'protransito02042024',
	);

	public $conteo = array(
		'datasource' => 'Database/Postgres',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'transito',
		'password' => 'transito',
		'database' => 'conteo',
	);

	public $parqueo = array(
		'datasource' => 'Database/Postgres',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'parqueape_user',
		'password' => 'parquea',
		'database' => 'parqueape',
	);

}