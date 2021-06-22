<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disertasi extends Model
{
    use HasFactory;
    protected $table = "disertasis";
    protected $fillable = ['student_id','topic_id','title','status'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function topic(){
        return $this->belongsTo(DisertasiTopic::class);
    }

    public function disertasi_lecturer(){
        return $this->hasMany(DisertasiLecturer::class,'disertasi_id','id');
    }

    public function academic(){
        return $this->hasMany(Academic::class,'academic_id','id');
    }
}
