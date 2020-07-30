<?php

use Illuminate\Database\Seeder;
use App\AccountType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
    	// Remove all rows and reset the auto-incrementing ID to zero
    	AccountType::truncate();
        // DateTime today
        $now = Carbon::now('utc')->toDateTimeString();

    	$account_types = [
    		['name' => 'Super Admin', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Administrator', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Employee', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Faculty Head', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Faculty', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'HR', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'IT', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Admission', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Registrar', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Guidance', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Student', 'created_at' => $now, 'updated_at' => $now]
    	];

    	AccountType::insert($account_types);
    	//AccountType::create(['name' => 'Super Admin']);
    	//AccountType::create(['name' => 'Administrator']);
    	//DB::table('account_types')->insert(['name' => 'Super Admin']);
    }
}
