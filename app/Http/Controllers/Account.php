<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Account extends Controller
{
  public function index() {
		//return view('layouts/app');

		$accounts = \App\Account::all();

		// Die and Dump data
		//dd($accounts);

		return view('account.index', compact('accounts'));
	}

	public function store() {
		$data = request()->validate([
			'username' => 'required|unique:accounts',
			'password' => 'required'
		]);

		//dd($data);

		// Laravel insert method
		//\App\Account::create($data);

		$account = new \App\Account();

		$account->username = request('username');
		$account->password = bcrypt(request('password'));
		$account->type = "E";
		$account->status = 1;
		$account->theme = 3;
		$account->save();
		//dd(request('username'));

		return redirect()->back();
	}
}
