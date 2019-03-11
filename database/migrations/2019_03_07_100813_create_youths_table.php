<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYouthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_title');
          $table->string('title');
          $table->string('first_name');
          $table->string('last_name');
           $table->string('mobile');
            $table->string('start_date'); 
            $table->string('work_address'); 
            $table->string('contact_signed');
             $table->string('id_number');
              $table->string('gender');
                $table->string('race');
                  $table->string('disabled');
                    $table->string('employee_number');
                      $table->string('monthly_salary');
                        $table->string('primary_email');
                          $table->string('sup_first_name');
                            $table->string('sup_last_name');
                              $table->string('sup_email');  
                                $table->string('sup_mobile');
                               
          $table->timestamp('created_at');
        });
        
    }
 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('youths');
    }
}
