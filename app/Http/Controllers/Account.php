<?php

namespace App\Http\Controllers;

use App\Account as AccountModel;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                    $employees = Employee::get();
                    return view('account', compact('user', 'employees'))->with('view', 'all');
                    break;
                
                case 'inactive':
                    $employees = Employee::where('account_id', '!=', null)->whereDoesntHave('account', function($query) {
                        $query->where('deleted_at', '=', null);
                    })->get();
                    //dd($employees);
                    return view('account', compact('user', 'employees'))->with('view', 'inactive');
                    break;

                default:
                    // Employee::get() will also work for 'active' since laravel will hide soft deleted Employees
                    $employees = Employee::where('account_id', '!=', null)->whereHas('account', function($query) {
                        $query->where('deleted_at', '=', null);
                    })->get();
                    return view('account', compact('user', 'employees'))->with('view', 'active');
                    break;
            }
        }

        //$employees = \App\Employee::get();
        $deletedAccounts = \App\Account::onlyTrashed()->get();
        $accountTypes = \App\AccountType::get();
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
        //
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
}
