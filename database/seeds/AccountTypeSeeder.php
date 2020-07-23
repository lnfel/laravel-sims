<?php

use Illuminate\Database\Seeder;
use App\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Remove all rows and reset the auto-incrementing ID to zero
    	AccountType::truncate();

    	$account_types = [
    		['name' => 'Super Admin'],
    		['name' => 'Administrator'],
    		['name' => 'Employee'],
    		['name' => 'Faculty Head'],
    		['name' => 'Faculty'],
    		['name' => 'HR'],
    		['name' => 'IT'],
    		['name' => 'Admission'],
    		['name' => 'Registrar'],
    		['name' => 'Guidance'],
    		['name' => 'Student']
    	];

    	AccountType::insert($account_types);
    	//AccountType::create(['name' => 'Super Admin']);
    	//AccountType::create(['name' => 'Administrator']);
    	//DB::table('account_types')->insert(['name' => 'Super Admin']);
    }
}
