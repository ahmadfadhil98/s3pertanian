<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = ['id','email','nim','name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function disertasi(){
        return $this->hasMany(Disertasi::class,'student_id','id');
    }

}
