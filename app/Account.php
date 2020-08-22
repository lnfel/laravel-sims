<?php

namespace App;

use App\Notifications\AccountResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Authenticatable
{
  use SoftDeletes;
  use Notifiable;

  protected $guard = 'account';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email', 'employee_id', 'account_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token) {
        $this->notify(new AccountResetPasswordNotification($token));
    }

    // define one-to-one relationship with AccountType model
    public function account_type() {
        return $this->belongsTo('App\AccountType')->withDefault();
    }

    public function status() {
        return $this->belongsTo('App\Status')->withDefault();
    }

    public function employee() {
        return $this->belongsTo('App\Employee')->withTrashed();
    }

    // check if logged in user is an Admin
    public function isAdmin() {
        return $this->account_type()->where('name', 'Super Admin')->exists();
    }
}
