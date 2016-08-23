<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsRecipesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ratings_recipes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->integer('recipe_id')->unsigned();
      $table->integer('rating');
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('ratings_recipes', function(Blueprint $table) {
      $table->foreign('user_id')->references('id')
      ->on('users')->onDelete('cascade');
      $table->foreign('recipe_id')->references('id')
      ->on('recipes')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('ratings_recipes');
  }
}
