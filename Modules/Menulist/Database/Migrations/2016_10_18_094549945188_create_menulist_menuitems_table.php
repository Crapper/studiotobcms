<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenulistMenuitemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menulist__menuitems', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('menulist_id')->unsigned();
			$table->foreign('menulist_id')->references('id')->on('menulist__menulists')->onDelete('cascade');
			$table->string('naam');
			$table->string('omschrijving');
			$table->decimal('prijs');
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
		Schema::drop('menulist__menuitems');
	}
}
