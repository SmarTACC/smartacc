<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTagsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('recipes_tags', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('recipe_id')->unsigned();
      $table->integer('tag_id')->unsigned();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('recipes_tags', function(Blueprint $table) {
      $table->foreign('recipe_id')->references('id')
      ->on('recipes')->onDelete('cascade');
      $table->foreign('tag_id')->references('id')
      ->on('tags')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('recipes_tags');
  }
}
