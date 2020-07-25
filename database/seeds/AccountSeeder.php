<?php

use Illuminate\Database\Seeder;
use App\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			// Remove all rows and reset the auto-incrementing ID to zero
    	Account::truncate();
      // DateTime today
      $now = Carbon::now('utc')->toDateTimeString();

    	$account = [
    		[
    			'username' => date("Ymd") . '01',
    			'password' => Hash::make('mmm'),
    			'employee_id' => 1,
    			'created_at' => $now,
    			'updated_at' => $now
    		],
    	];

    	Account::insert($account);
    }
}
