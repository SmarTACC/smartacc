<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
  use SoftDeletes;

  protected $table = 'places';

  protected $fillable = [
    'lat', 'lon', 'name', 'address', 'description'
  ];

  public function category() {
    return $this->belongsTo('App\Category')->orderBy('name', 'asc');
  }

  public function ratingsPlaces() {
    return $this->hasMany('App\RatingsPlaces')->orderBy('name', 'asc');
  }
}
