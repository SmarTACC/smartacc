<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeIngredient extends Model
{
  use SoftDeletes;

  public function recipe() {
    return $this->belongsTo('App\Recipe');
  }

  public function ingredient() {
    return $this->belongsTo('App\Ingredient');
  }

  public function unit() {
    return $this->belongsTo('App\Unit');
  }

  protected $table = 'recipes_ingredients';
}
