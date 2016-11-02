<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageExtentionPageExtentionTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pageextention__pageextention_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');

			$table->string('sub_title');

            $table->integer('page_extention_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['page_extention_id', 'locale'],'page_extention_id_local_unique');
            $table->foreign('page_extention_id')->references('id')->on('pageextention__pageextentions')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pageextention__pageextention_translations');
	}
}
