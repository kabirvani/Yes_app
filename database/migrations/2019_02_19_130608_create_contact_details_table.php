<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('primary_first_name')->nullable();
            $table->string('primary_last_name')->nullable();
            $table->string('primary_phone_num')->nullable();
            $table->string('primary_country_code')->nullable();
            $table->string('account_first_name')->nullable();
            $table->string('account_last_name')->nullable();
            $table->string('account_phone_num')->nullable();
            $table->string('account_country_code')->nullable();
            $table->string('account_email')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            Schema::disableForeignKeyConstraints();
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
        Schema::dropIfExists('contact_details');
    }
}
