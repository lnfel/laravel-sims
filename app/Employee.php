<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
	use SoftDeletes;
	
  protected $fillable = [
		'personal_email',
		'first_name',
		'middle_name',
		'last_name',
		'address',
		'region',
		'province',
		'municipality',
		'brgy',
		'zip_code',
  ];

  public function account() {
  	return $this->hasOne('App\Account')->withTrashed();
  }
}
