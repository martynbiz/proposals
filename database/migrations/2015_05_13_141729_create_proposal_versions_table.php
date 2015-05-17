<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proposal_versions', function(Blueprint $table)
		{
			$table->increments('id');
			
			// fields
			
			$table->text('title');
			$table->string('title_unified');
			$table->text('content');
			$table->string('content_unified');
			$table->integer('proposal_id')
				->unsigned()
				->index();
			
			// timestamps
			$table->date('versioned_at');
			$table->timestamps();
			$table->softDeletes();
			
			
			// foreign keys
			
			// question_id foreign key relationship 
			$table->foreign('proposal_id')
				->references('id')
				->on('proposals');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proposal_versions');
	}

}
