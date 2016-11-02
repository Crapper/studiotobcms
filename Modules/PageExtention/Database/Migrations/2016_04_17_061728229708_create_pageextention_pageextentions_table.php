<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageExtentionPageExtentionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pageextention__pageextentions', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

			$table->integer('page_id');
			$table->string('author');
			$table->string('kolom');
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
		Schema::drop('pageextention__pageextentions');
	}
}
