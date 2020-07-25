<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique()->default('lnfel@gmail.com');
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('employee_id')->unique();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedBigInteger('account_type_id')->default(1);
            $table->foreign('account_type_id')->references('id')->on('account_types');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->integer('theme')->default(3);
            $table->rememberToken();
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
        Schema::dropIfExists('accounts');
    }
}
