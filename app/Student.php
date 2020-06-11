<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function details(){
        return $this->hasMany(StudentDetail::class,'student_id');
    }

    public function getFotoAttribute($value){
        return url('storage/'.$value);
    }
}
