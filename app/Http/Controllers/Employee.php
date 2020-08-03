<?php

namespace App\Http\Controllers;

use App\Employee as EmployeeModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

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
    public function index()
    {
        // Check if a record exists on accounts table
        $accountExists = \App\Account::exists();
        $employeeExists = \App\Employee::exists();

        if ($accountExists) {
          // Get latest or last username created
          $last_username = \App\Account::latest('created_at')->first()->username;
          // Increment last username value
          // Note that php already coerce string to int conversion when doing this
          // In cases we want to explicitly convert the type:
          // we can cast it Ex. (int)$last_username 
          $new_username = $last_username + 1;
        } else {
          $last_username = null;
          $new_username = null;
        }

        $user = Auth::user();
        if ($user->isAdmin()) {
          $account_types = \App\AccountType::get();
        } else {
          $account_types = \App\AccountType::whereNotIn('name', ['Super Admin', 'Administrator'])->get();
        }

        //$response = Http::get('http://bkintanar.site/api/regions');

        $regions = DB::table('philippine_regions')->get();
        //$provinces = DB::table('philippine_provinces')->get();
        //$cities = DB::table('philippine_cities')->get();
        //$barangays = DB::table('philippine_barangays')->get();
        //, 'provinces', 'cities', 'barangays'

        if ($employeeExists) {
            $employees = \App\Employee::get();
        }

        $employee = [];
        
        return view('employee', compact('user', 'regions', 'last_username', 'new_username', 'account_types', 'employee', 'employees'));
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
        /*$dataEmployee = request()->validate([
            'number' => 'required',
            'account_type' => [
                'required',
                Rule::notIn([0]),
            ],
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'middle_name' => 'required|alpha',
            'employee_email' => 'required|email',
        ]);*/

        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'account_type' => [
                'required',
                Rule::notIn([0]),
            ],
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'middle_name' => 'required|alpha',
            'personal_email' => 'required|email',
        ])->validateWithBag('storeEmployee');

        $employee = new \App\Employee();
        $employee->number = request('number');
        $employee->first_name = request('first_name');
        $employee->last_name = request('last_name');
        $employee->middle_name = request('middle_name');
        $employee->personal_email = request('personal_email');
        $employee->save();

        $account = new \App\Account();
        $account->username = request('number');
        $account->password = Hash::make('mmm');
        $account->email = $employee->personal_email;
        $account->employee()->associate($employee);
        //$account->employee->save($employee);
        $account->save();

        return redirect()->back()->withErrors($validator, 'storeEmployee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $data = [];
        $data['employee'] = \App\Employee::where('number', $employee)->get()->toArray();
        $data['account'] = \App\Account::where('employee_id', $data['employee'][0]['id'])->get()->toArray();

        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
