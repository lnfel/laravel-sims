<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Account extends Controller
{
  public function index() {
		//return view('layouts/app');

		$accounts = \App\Account::all();
		$account_types = \App\AccountType::all();

		$super_admin = \App\AccountType::find(1)->accounts;

		$accounts_on_type = \App\AccountType::get();

		// Die and Dump data
		//dd($accounts);

		return view('account.index', compact('accounts', 'account_types', 'super_admin', 'accounts_on_type'));
	}

	public function store() {
		$data = request()->validate([
			'username' => 'required|unique:accounts',
			'password' => 'required'
		]);

		//dd($data);

		// Laravel insert method but without hashing method
		//\App\Account::create($data);

		$account = new \App\Account();

		//$account->password = bcrypt(request('password'));

		$account_type = \App\Account::find(1);

		$account->username = request('username');
		$account->email = request('email');
		$account->password = Hash::make(request('password'));
		$account->account_type()->associate($account_type);
		$account->status = 1;
		$account->theme = 3;
		$account->save();
		//dd(request('username'));

		return redirect()->back();
	}
}
