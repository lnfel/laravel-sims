<?php

namespace App\Http\Controllers;

use App\Employee as EmployeeModel;
use App\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;
use Carbon\Carbon;
use App\Events\CreatingNewEmployeeEvent;

class Employee extends Controller
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
        // Check if a record exists on account and employees table
        $accountExists = \App\Account::exists();
        $employeeExists = \App\Employee::exists();

        $user = Auth::user();
        if ($user->isAdmin()) {
          $account_types = \App\AccountType::get();
        } else {
          $account_types = \App\AccountType::whereNotIn('name', ['Super Admin', 'Administrator'])->get();
        }

        $regions = DB::table('philippine_regions')->get();

        if ($employeeExists) {
            $view = $request->query('view', 'active');
            switch ($view) {
                case 'all':
                    $employees = EmployeeModel::withTrashed()->get();
                    break;
                
                case 'inactive':
                    $employees = EmployeeModel::onlyTrashed()->get();
                    break;

                default:
                    // Employee::get() will also work for 'active' since laravel will hide soft deleted Employees
                    $employees = EmployeeModel::whereNull('deleted_at')->get();
                    break;
            }
        }

        $data = $request->session()->all();
        
        return view('employee', compact('user', 'regions', 'account_types', 'employees', 'data'));
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
        $validator = Validator::make($request->all(), [
            //'number' => 'required',
            'account_type' => [
                'required',
                Rule::notIn([0]),
            ],
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'middle_name' => 'required|alpha',
            'personal_email' => 'required|email|unique:employees,personal_email',
            'address' => 'sometimes|required_with:region,province,municipality,brgy,zip_code',
            'region' => 'sometimes|required_with:address,zip_code',
            'province' => 'sometimes|required_with:region,address,zip_code',
            'municipality' => 'sometimes|required_with:address,region,province,zip_code',
            'brgy' => 'sometimes|required_with:address,region,province,municipality,zip_code',
            'zip_code' => 'sometimes|required_with:address,region,province,municipality,brgy',
        ],
        [
            'required_with' => 'Address must be complete.',
            'personal_email.required' => 'The email field is required.',
            'personal_email.unique' => 'Email has already been taken.'
        ]);

        //->validateWithBag('storeEmployee')
        //$request->session()->flash('success', 'Task was successful!');

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator, 'storeEmployee')
                    ->withInput($request->only('personal_email', 'first_name', 'middle_name', 'last_name', 'address', 'account_type'));
        }

        $employee = new \App\Employee();
        $account = new \App\Account();
        //CreatingNewEmployeeEvent::dispatch($employee, $account);
        CreatingNewEmployeeEvent::dispatch($employee);
        //event(new CreatingNewEmployeeEvent($employee));
        
        //$employee->number = request('number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->middle_name = request('middle_name');
        $employee->personal_email = request('personal_email');
        $employee->address = request('address');
        $employee->region = request('region');
        $employee->province = request('province');
        $employee->municipality = request('municipality');
        $employee->brgy = request('brgy');
        $employee->zip_code = request('zip_code');
        $employee->save();

        //$account->username = request('number');
        /*$account->password = Hash::make('mmm');
        $account->email = $employee->personal_email;
        $account->account_type_id = request('account_type');
        $account->employee()->associate($employee);
        $account->save();*/

        $role = \App\AccountType::find(request('account_type'));

        $message = $employee->first_name . ' has been registered as ' . $role->name;

        //$message = "sample message";

        return redirect()->back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeModel $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeModel $employee)
    {
        $data = [];
        $data['employee'] = $employee->toArray();
       // $data['account'] = \App\Account::where('employee_id', $employee->id)->get()->toArray();

        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeModel $employee)
    {
        $validator = Validator::make($request->all(), [
            'edit_number' => 'required',
            'edit_account_type' => [
                'required',
                Rule::notIn([0]),
            ],
            'edit_first_name' => 'required|alpha',
            'edit_last_name' => 'required|alpha',
            'edit_middle_name' => 'required|alpha',
            'edit_personal_email' => 'required|email',
            'edit_address' => 'sometimes|required_with:edit_region,edit_province,edit_municipality,edit_brgy,edit_zip_code',
            'edit_region' => 'sometimes|required_with:edit_address,edit_zip_code',
            'edit_province' => 'sometimes|required_with:edit_region,edit_address,edit_zip_code',
            'edit_municipality' => 'sometimes|required_with:edit_address,edit_region,edit_province,edit_zip_code',
            'edit_brgy' => 'sometimes|required_with:edit_address,edit_region,edit_province,edit_municipality,edit_zip_code',
            'edit_zip_code' => 'sometimes|required_with:edit_address,edit_region,edit_province,edit_municipality,edit_brgy',
        ],
        [
            'required_with' => 'Address must be complete.',
            'edit_personal_email.required' => 'The email field is required.',
            'edit_personal_email.unique' => 'Email has already been taken.'
        ]);

        //->validateWithBag('updateEmployee')

        if ($validator->fails()) {
            return redirect('employees')
                    ->withErrors($validator, 'updateEmployee')
                    ->withInput($request->only('edit_personal_email', 'edit_first_name', 'edit_middle_name', 'edit_last_name', 'edit_address', 'edit_account_type'))
                    ->with('employee_id', $employee->id);
        }

        $employee->first_name = request('edit_first_name');
        $employee->middle_name = request('edit_middle_name');
        $employee->last_name = request('edit_last_name');
        $employee->personal_email = request('edit_personal_email');
        $employee->address = request('edit_address');
        $employee->region = request('edit_region');
        $employee->province = request('edit_province');
        $employee->municipality = request('edit_municipality');
        $employee->brgy = request('edit_brgy');
        $employee->zip_code = request('edit_zip_code');
        $employee->save();

        $account = Account::where('employee_id', request('employee_id'))->first();
        $account->account_type_id = request('edit_account_type');
        $account->email = $employee->personal_email;
        $account->save();

        $message = $employee->first_name . "'s record has been updated.";

        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, EmployeeModel $employee)
    {
        // soft delete not working here for some reason
        // might be constrained only for forceDelete method
        
    }

    public function softDelete(Request $request, EmployeeModel $employee)
    {
        /*$account = Account::where('employee_id', $employee->id)->first();
        $account->status_id = 2;
        $account->save();
        $employee->account->delete();*/
        $employee->delete();
        return redirect()->route('employees.index');
    }

    public function restore($employee)
    {
        /*$account = Account::onlyTrashed()->where('employee_id', $employee->id)->first();
        $account->status_id = 1;
        $account->save();
        $account->restore();*/
        EmployeeModel::withTrashed()->where('id', $employee)->restore();
        return redirect()->route('employees.index');
    }
}
