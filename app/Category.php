<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $table = 'categories';

  protected $fillable = [
    'name'
  ];

  public function places() {
    return $this->hasMany('App\Place')->orderBy('name', 'asc');
  }
}
