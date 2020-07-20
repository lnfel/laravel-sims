<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

		// Laravel insert method but without hashing method
		//\App\Account::create($data);

		$account = new \App\Account();

		//$account->password = bcrypt(request('password'));

		$account->username = request('username');
		$account->password = Hash::make(request('password'));
		$account->type = "E";
		$account->status = 1;
		$account->theme = 3;
		$account->save();
		//dd(request('username'));

		return redirect()->back();
	}
}
