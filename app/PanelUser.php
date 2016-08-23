<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PanelUser extends Model
{
  protected $fillable = [
    'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];
}
