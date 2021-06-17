<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disertasi extends Model
{
    use HasFactory;
    protected $table = "disertasis";
    protected $fillable = ['student_id','title','status'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function disertasi_lecturer(){
        return $this->hasMany(DisertasiLecturer::class,'disertasi_id','id');
    }
}
