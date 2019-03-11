<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $table = 'company_details';
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
