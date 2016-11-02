<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentBlockTextContentBlockTextTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contentblocktext__contentblocktext_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
			$table->string('title');
			$table->text('body');
			$table->integer('order');

            $table->integer('contentblocktext_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['contentblocktext_id', 'locale']);
            $table->foreign('contentblocktext_id')->references('id')->on('contentblocktext__contentblocktexts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contentblocktext__contentblocktext_translations');
	}
}
