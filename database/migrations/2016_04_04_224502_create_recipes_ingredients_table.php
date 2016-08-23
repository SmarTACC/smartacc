<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesIngredientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('recipes_ingredients', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('recipe_id')->unsigned();
      $table->integer('ingredient_id')->unsigned();
      $table->integer('unit_id')->unsigned();
      $table->float('amount')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('recipes_ingredients', function(Blueprint $table) {
      $table->foreign('recipe_id')->references('id')
      ->on('recipes')->onDelete('cascade');
      $table->foreign('ingredient_id')->references('id')
      ->on('ingredients')->onDelete('cascade');
      $table->foreign('unit_id')->references('id')
      ->on('units')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('recipes_ingredients');
  }
}
