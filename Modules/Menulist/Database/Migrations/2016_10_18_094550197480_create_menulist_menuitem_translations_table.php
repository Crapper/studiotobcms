<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenulistMenuitemTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menulist__menuitem_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('menuitem_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['menuitem_id', 'locale']);
            $table->foreign('menuitem_id')->references('id')->on('menulist__menuitems')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menulist__menuitem_translations');
	}
}
