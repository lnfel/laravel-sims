<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;
use App\Rules\ValidAccountPassword;

class AccountLoginController extends Controller
{
	public function __construct() {
		$this->middleware('guest:account')->except('logout');
	}

	public function showLoginForm() {
		return view('auth.account-login');
	}

	public function login(Request $request) {
		// Validate form data
		/*$this->validate($request,
			[
				'username' => 'required|string',
				'password' => 'required|string',
			]
		);*/

		/*$validator = Validator::make($request->all(), [
	    'username' => 'required|string',
			'password' => 'required|string',
		])->validateWithBag('account');*/

		$validator = Validator::make($request->all(), [
	    'username' => [
	    	'required',
	    	'string',
	    	Rule::exists('accounts')->where(function ($query) {
            $query->where('status_id', 1);
        })
	    ],
			'password' => [
				'required',
				'string',
				new ValidAccountPassword],
		],
		[
			'username.exists' => 'The username you entered is not registered.',
		])->validate();

		/*$data = $this->validate($request, [
			'username' => 'required|string',
			'password' => 'required|string',
		]);*/

		// Attempt to login as account
		if (Auth::guard('account')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
			// If successful then redirect to intended route or dashboard
			return redirect()->intended(route('dashboard'));
		}

		// If unsuccessful then redirect back to login page with username and remember fields
		return redirect()->back()->withInput($request->only('username', 'remember'))->withErrors($validator);
	}

	public function logout(Request $request) {
		Auth::guard('account')->logout();
		return redirect('/');
	}
}
