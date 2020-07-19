<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

		$data = $this->validate($request, [
			'username' => 'required|string',
			'password' => 'required|string',
		]);

		//dd($data);

		// Attempt to login as account
		if (Auth::guard('account')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
			// If successful then redirect to intended route or dashboard
			return redirect()->intended(route('dashboard'));
		}

		// If unsuccessful then redirect back to login page with username and remember fields
		return redirect()->back()->withInput($request->only('username', 'remember'));
	}

	public function logout(Request $request) {
		Auth::guard('account')->logout();
		return redirect('/');
	}
}
