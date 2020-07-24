<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $fillable = [
		'name',
  ];

  public function accounts() {
  	return $this->hasMany('App\Account');
  }
}
