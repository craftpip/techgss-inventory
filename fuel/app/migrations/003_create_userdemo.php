<?php

namespace Fuel\Migrations;

class Create_userdemo
{
	public function up()
	{
		\DBUtil::create_table('userdemo', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('type' => 'text'),
			'email' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 125, 'type' => 'varchar'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('userdemo');
	}
}