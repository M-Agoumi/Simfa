<?php

class mg0004_create_user_preferences_table extends \Simfa\Framework\Db\Migration
{

	function up()
	{
		\Simfa\Framework\Db\Migration::create('preferences', function (\Simfa\Framework\Db\Migration\Schema $table) {
			$table->id();
			$table->int('user');
			$table->int('language');
			$table->timestamps();

			return $table;
		});
	}

	function down()
	{
		\Simfa\Framework\Db\Migration::drop('preferences');
	}
}
