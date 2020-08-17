<?php

namespace App\Listeners;

use App\Events\CreatingNewEmployeeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class GenerateEmployeeNumberListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatingNewEmployeeEvent  $event
     * @return void
     */
    public function handle(CreatingNewEmployeeEvent $event)
    {
        $accountExists = \App\Account::exists();
        $employeeExists = \App\Employee::exists();
        $now = Carbon::now('utc')->toDateString();

        if ($accountExists) {
            // Get latest or last username created
            $last_username = \App\Account::latest('created_at')->first()->username;
            // Increment last username value
            // Note that php already coerce string to int conversion when doing this
            // In cases we want to explicitly convert the type:
            // we can cast it Ex. (int)$last_username 
            if (\App\Account::latest('created_at')->first()->created_at->toDateString() == $now) {
                // if latest account is created today, increment it
                $new_username = $last_username + 1;
            } else {
                // generate id using date today
                $new_username = date("Ymd") . '01';
            }
        } else {
            $last_username = null;
            $new_username = null;
        }

        if ($new_username != null) {
            $event->employee->number = $new_username;
            $event->account->username = $event->employee->number;
        } else {
            $event->employee->number = date('Ymd').'01';
            $event->account->username = $event->employee->number;
        }
    }
}
