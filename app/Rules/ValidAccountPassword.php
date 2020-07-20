<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Account;
use Illuminate\Support\Facades\Auth;

class ValidAccountPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // get username from request params
        $username = request()->username;
        // get password hash by querying via username
        $passwordHash = Account::where('username', '=', $username)->first()->password;
        // compare input password with password in the database
        return Hash::check($value, $passwordHash);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password does not match.';
    }
}
