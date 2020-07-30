<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = [
		'employee_number',
		'employee_type_id',
		'department_id',
		'position',
		'last_name',
		'fisrt_name',
		'middle_name',
  ];

  public function account() {
  	return $this->hasOne('App\Account');
  }
}
