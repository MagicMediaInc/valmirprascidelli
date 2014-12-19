<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('gallery',function($table){

			$table->create();
			$table->bigIncrements('id');
			$table->string('title');
			$table->string('description');
			$table->integer('idAlbum');
			$table->date('datePublication');
			$table->integer('status');
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
		Schema::drop('gallery');

	}

}
