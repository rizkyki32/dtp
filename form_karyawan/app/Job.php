<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = "jobs";

    protected $fillable = ['perusahaan','jabatan','tahun','keterangan','employee_id'];
 
    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }
}
