<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenulistMenulistTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menulist__menulist_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('menulist_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['menulist_id', 'locale']);
            $table->foreign('menulist_id')->references('id')->on('menulist__menulists')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menulist__menulist_translations');
	}
}
