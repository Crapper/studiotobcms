<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselCarouselTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carousel__carousel_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
			$table->string('name');
            $table->integer('carousel_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['carousel_id', 'locale']);
            $table->foreign('carousel_id')->references('id')->on('carousel__carousels')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carousel__carousel_translations');
	}
}
