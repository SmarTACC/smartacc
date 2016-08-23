<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('places', function (Blueprint $table) {
      $table->increments('id');
      $table->double('lat');
      $table->double('lon');
      $table->string('name');
      $table->string('address');
      $table->text('description');
      $table->text('website')->nullable();
      $table->text('phone')->nullable();
      $table->integer('category_id')->unsigned();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('places', function(Blueprint $table)
    {
      $table->foreign('category_id')->references('id')
      ->on('categories')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('places');
  }
}
