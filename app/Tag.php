<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name'
  ];

  public function recipes() {
    return $this->belongsToMany('App\Recipe', 'recipes_tags')->orderBy('name', 'asc');
  }
}
