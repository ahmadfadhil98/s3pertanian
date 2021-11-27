<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $table = "lecturers";
    protected $fillable = ['id','nip','name','faculty'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function disertasi_lecturer(){
        return $this->hasMany(DisertasiLecturer::class,'lecturer_id','id');
    }

    public function marking(){
        return $this->hasMany(Marking::class,'lecturer_id','id');
    }
}
