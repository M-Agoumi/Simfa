<?php

class mg0003_create_user_token_table extends \Simfa\Framework\Db\Migration
{

	function up()
	{
		\Simfa\Framework\Db\Migration::create('user_token', function (\Simfa\Framework\Db\Migration\Schema $table) {
			$table->id();
			$table->int('user');
			$table->string('token');
			$table->smallInt('used');
			$table->timestamps();

			return $table;
		});
	}

	function down()
	{
		\Simfa\Framework\Db\Migration::drop('user_token');
	}
}
