<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = ['nama','alamat','no_ktp'];

    public function education()
    {
        return $this->hasMany('App\Education');
    }
    public function job()
    {
        return $this->hasMany('App\Job');
    }
}
