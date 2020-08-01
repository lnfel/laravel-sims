<?php

use Illuminate\Database\Seeder;
use App\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class StatusSeeder extends Seeder
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
    	Status::truncate();
        // DateTime today
        $now = Carbon::now('utc')->toDateTimeString();

    	$status = [
    		['name' => 'Active', 'created_at' => $now, 'updated_at' => $now],
    		['name' => 'Inactive', 'created_at' => $now, 'updated_at' => $now]
    	];

    	Status::insert($status);
    }
}
