<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('reg_num')->nullable();
            $table->string('company_type')->nullable();
            $table->string('industry')->nullable();
            $table->string('tel_num')->nullable();
            $table->string('country_code')->nullable();
            $table->string('website_address')->nullable();
            $table->string('financial_year_end')->nullable();
            $table->string('vat_num')->nullable();
            $table->string('beee_level')->nullable();
            $table->string('beee_certificate')->nullable();
            $table->string('physical_address_line1')->nullable();
            $table->string('physical_address_line2')->nullable();
            $table->string('physical_city')->nullable();
            $table->string('physical_state')->nullable();
            $table->string('physical_zip_code')->nullable();
            $table->string('physical_country')->nullable();
            $table->string('postal_address_line1')->nullable();
            $table->string('postal_address_line2')->nullable();
            $table->string('postal_city')->nullable();
            $table->string('postal_state')->nullable();
            $table->string('postal_zip_code')->nullable();
            $table->string('postal_country')->nullable();
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
        Schema::dropIfExists('company_details');
    }
}
