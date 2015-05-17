<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('votes', function(Blueprint $table)
		{
			$table->increments('id');
			
			// fields
			$table->integer('score');
			$table->integer('proposal_id')
				->unsigned()
				->index();
			$table->integer('user_id')
				->unsigned()
				->index();
			
			// timestamps
			$table->timestamps();
			$table->softDeletes();
			
			
			// foreign keys
			
			// proposal_id foreign key relationship 
			$table->foreign('proposal_id')
				->references('id')
				->on('proposals');
			
			// user_id foreign key relationship 
			$table->foreign('user_id')
				->references('id')
				->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('votes');
	}

}
