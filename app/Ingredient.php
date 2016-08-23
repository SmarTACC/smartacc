<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name'
  ];

  public function recipes() {
    return $this->belongsToMany('App\Recipe', 'recipes_ingredients')->orderBy('name', 'asc');
  }
}
