<?php

use Illuminate\Database\Seeder;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class EmployeeSeeder extends Seeder
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
    	Employee::truncate();
      // DateTime today
      $now = Carbon::now('utc')->toDateTimeString();

    	$employee = [
    		[
    			'number' => date("Ymd") . '01',
    			'last_name' => 'Suzuhara',
    			'first_name' => 'Lulu',
    			'middle_name' => 'S.',
    			'created_at' => $now,
    			'updated_at' => $now
    		],
    	];

    	Employee::insert($employee);
    }
}
