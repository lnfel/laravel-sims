<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->unsignedBigInteger('employee_type_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('position')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->string('address')->default('#23 Bahay ni Kuya dyan sa may kanto');
            $table->string('brgy')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('company_email')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('facebook_email')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('blood_type')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('crn')->nullable();
            $table->string('tin')->nullable();
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('pag_ibig')->nullable();
            $table->date('hired_probationary')->nullable();
            $table->date('hired_regular')->nullable();
            $table->date('resigned')->nullable();
            $table->date('retired')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
