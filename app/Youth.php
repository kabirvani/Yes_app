<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youth extends Model
{
    protected $fillable = [
      'job_title',
      'title',
      'first_name',
      'last_name',
      'start_date',
      'work_address',
      'contact_signed',
      'id_number',
      'gender',
      'race',
      'disabled',
      'employee_number',
      'monthly_salary',
      'primary_email',
      'sup_first_name',
      'sup_last_name',
      'sup_email',
      'sup_mobile',
      'created_at'
    ];
}
 