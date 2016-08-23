<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsPlacesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ratings_places', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->integer('place_id')->unsigned();
      $table->integer('rating');
      $table->timestamps();
    });
    
    Schema::table('ratings_places', function(Blueprint $table) {
      $table->foreign('user_id')->references('id')
      ->on('users')->onDelete('cascade');
      $table->foreign('place_id')->references('id')
      ->on('places')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('ratings_places');
  }
}
