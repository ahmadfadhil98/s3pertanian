<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = "penilaians";
    protected $fillable = ['lecturer_id','academic_id','score','grade','revisi'];

    public function lecturer_id(){
        return $this->belongsTo(Lecturer::class);
    }

    public function academic(){
        return $this->belongsTo(Academic::class);
    }


}
