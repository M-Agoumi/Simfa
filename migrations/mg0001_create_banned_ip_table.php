<?php

use Simfa\Framework\Db\Migration;
use Simfa\Framework\Db\Migration\Schema;

class mg0001_create_banned_ip_table extends Migration
{
	public function up()
	{
		Migration::create('banned_ip', function(Schema $table){
			$table->id();
			$table->string('address')->length(45);
			$table->smallInt('status');
			$table->text('comment');
			$table->timestamps();

			return $table;
		});
	}

	public function down()
	{
		Migration::drop('banned_ip');
	}
}