<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDetail extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function students(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
