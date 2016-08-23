<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingsPlace extends Model
{
  protected $fillable = [
    'user_id', 'place_id', 'rating'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function place() {
    return $this->belongsTo('App\Place');
  }
}
