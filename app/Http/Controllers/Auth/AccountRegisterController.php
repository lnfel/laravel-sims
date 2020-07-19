<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Account;
use Illuminate\Support\Facades\Auth;

class AccountRegisterController extends Controller
{
  public function __construct() {
		$this->middleware('guest:account');
	}

	public function showRegisterForm() {
		return view('auth.account-register');
	}

	public function register(Request $request) {
		// Validate form data
		$this->validate($request,
			[
				'username' => ['required', 'string', 'max:255', 'unique:accounts'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
				'password' => ['required', 'string', 'max:255'],
			]
		);

		// Create account
		try {
			$account = Account::create([
				'username' => $request->username,
				'email' => $request->email,
				'password' => Hash::make($request->password),
			]);

			// Login the account
			Auth::guard('account')->loginUsingId($account->id);
			return redirect()->route('dashboard');
		} catch (\Exception $e) {
			return redirect()->back()->withInput($request->only('username', 'email'));
		}
	}
}
