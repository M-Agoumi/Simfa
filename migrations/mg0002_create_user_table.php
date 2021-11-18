<?php

use Simfa\Framework\Db\Migration;
use Simfa\Framework\Db\Migration\Schema;

class mg0002_create_user_table extends Migration
{
	public function up()
	{
		Migration::create('users', function(Schema $table){
			$table->id();
			$table->string('name');
			$table->string('username');
			$table->string('email');
			$table->smallInt('status');
			$table->string('password');
			$table->timestamps();

			return $table;
		});
	}

	public function down()
	{
		Migration::drop('users');
	}
}
