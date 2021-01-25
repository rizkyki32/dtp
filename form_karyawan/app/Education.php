<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = "educations";

    protected $fillable = ['nama_sekolah_univ','jurusan','tahun_masuk','tahun_lulus','employee_id'];
 
    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }
}
