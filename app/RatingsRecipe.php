<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingsRecipe extends Model
{
  protected $fillable = [
    'user_id','recipe_id','rating'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function recipe() {
    return $this->belongsTo('App\Recipe');
  }
}
