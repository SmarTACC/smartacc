<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $fillable = [
    'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];
  
  public function ratingsRecipes() {
    return $this->hasMany('App\RatingsRecipe')->orderBy('name', 'asc');
  }
  
  public function ratingsPlaces() {
    return $this->hasMany('App\RatingsPlace')->orderBy('name', 'asc');
  }
}
