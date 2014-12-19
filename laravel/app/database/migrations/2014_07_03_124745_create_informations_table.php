<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('informations',function($table){

			$table->create();
			$table->bigIncrements('id');
			$table->string('title');
			$table->string('description');
			$table->longText('content');
			$table->string('mainImage');
			$table->integer('idAlbum');
			$table->integer('idPage');
			$table->datetime('dateInformation');
			$table->integer('status');
			$table->integer('visibility');
			$table->softDeletes();
			$table->timestamps();

		});
}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('informations');
	}

}
