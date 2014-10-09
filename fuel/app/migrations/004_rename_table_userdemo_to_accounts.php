<?php

namespace Fuel\Migrations;

class Rename_table_userdemo_to_accounts
{
	public function up()
	{
		\DBUtil::rename_table('userdemo', 'accounts');
	}

	public function down()
	{
		\DBUtil::rename_table('accounts', 'userdemo');
	}
}