<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Account extends Controller
{
  public function index() {
  	// Get all Accounts
		$accounts = \App\Account::all();
		// Get all Account Type rows
		$account_types = \App\AccountType::all();

		// Note: With all(), you cannot modify the query performed at all (except you can choose the columns to select by passing them as parameters).
		// get() is a method on the Eloquent\Builder object. If you need to modify the query, such as adding a where clause, then you have to use get(). For example, User::where('name', 'David')->get();

		// Get all Account Types
		$accounts_on_type = \App\AccountType::get();
		// Check if a record exists on accounts table
		$exists = \App\Account::exists();
		
		if ($exists) {
			// Get latest or last username created
			$last_username = \App\Account::latest('created_at')->first()->username;
			// Increment last username value
			// Note that php already coerce string to int conversion when doing this
			// In cases we want to explicitly convert the type:
			// we can cast it Ex. (int)$last_username 
			$new_username = $last_username + 1;
			// Get all accounts with Super Admin role
			$super_admin = \App\AccountType::find(1)->accounts;
		} else {
			$last_username = null;
			$new_username = null;
			$super_admin = null;
		}

		$status = \App\Status::get();

		// Die and Dump data
		//dd($accounts);

		return view('account.index', compact('accounts', 'account_types', 'super_admin', 'accounts_on_type', 'last_username', 'new_username', 'status'));
	}

	public function store() {
		$data = request()->validate([
			'username' => 'required|unique:accounts',
			'password' => 'required',
			'email' => 'required|email',
			'account_type' => 'required',
		]);

		//dd($data);

		// Laravel insert method but without hashing method
		//\App\Account::create($data);

		$account = new \App\Account();

		//$account->password = bcrypt(request('password'));

		//$account_type = \App\AccountType::find(1);

		$account->username = request('username');
		$account->email = request('email');
		$account->password = Hash::make(request('password'));
		//$account->account_type()->associate($account_type);
		$account->account_type()->associate(request('account_type'));
		//$account->status()->associate(request($variableForStatus));
		$account->theme = 3;
		$account->save();
		//dd(request('username'));

		return redirect()->back();
	}
}
