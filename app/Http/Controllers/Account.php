<?php

namespace App\Http\Controllers;

use App\Account as AccountModel;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Account extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:account');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $employeeExists = \App\Employee::exists();

        if ($employeeExists) {
            $view = $request->query('view', 'active');
            switch ($view) {
                case 'all':
                    $employees = Employee::all();
                    //return view('account', compact('user', 'employees'))->with('view', 'all');
                    break;
                
                case 'inactive':
                    $employees = Employee::where('account_id', '!=', null)->whereDoesntHave('account', function($query) {
                        $query->where('deleted_at', '=', null);
                    })->get();
                    //dd($employees);
                    //return view('account', compact('user', 'employees'))->with('view', 'inactive');
                    break;

                case 'no-account':
                    $employees = Employee::where('account_id', null)->get();
                    break;

                default:
                    $employees = Employee::where('account_id', '!=', null)->whereHas('account', function($query) {
                        $query->where('deleted_at', '=', null);
                    })->get();
                    //return view('account', compact('user', 'employees'))->with('view', 'active');
                    break;
            }
        }
        
        return view('account', compact('user', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Employee::where('id', request('user_id'))->first();
        // https://stackoverflow.com/questions/1846202/php-how-to-generate-a-random-unique-alphanumeric-string-for-use-in-a-secret-l
        $password = bin2hex(random_bytes(4));
        $request->merge(
            [
                'username' => $user->number,
                'password' => Hash::make($password),
                'email' => $user->company_email,
                'employee_id' => $user->id,
                'account_type_id' => $user->account_type_id,
                'password_text' => utf8_encode($password),
            ]
        );

        $account = AccountModel::create($request->except('user_id', 'password_text'));

        $user->account_id = $account->id;
        $user->save();

        $account->employee()->associate($user);
        $account->save();

        return back()->with('success', 'Successfully assigned an account to '. $user->first_name .'.');
        //return $request->all();
        //return $account->toSql();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }

    public function softDelete(Request $request, AccountModel $account)
    {
        $account->status_id = 2;
        $account->save();
        $account->delete();
        return redirect()->route('accounts.index')->with('danger', $account->employee->first_name . "'s account was deleted.");
    }

    public function restore($account)
    {
        $account = AccountModel::withTrashed()->where('id', $account)->first();
        $account->status_id = 1;
        $account->save();
        $account->restore();
        return redirect()->route('accounts.index')->with('success', $account->employee->first_name . "'s account was restored.");
    }
}
