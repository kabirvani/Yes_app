<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoicesToCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_details', function (Blueprint $table) {
            //
            $table->string('po_number')->nullable();
            $table->string('salesorder_no')->nullable();
            $table->string('invoice_number')->nullable();
            $table->integer('payment_confirm')->nullable()->default(0);
            $table->integer('commit_confirmed')->nullable()->default(0);
            $table->integer('paymentstatus')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_details', function (Blueprint $table) {
            //
        });
    }
}
