<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisertasiLecturer extends Model
{
    use HasFactory;
    protected $table = "disertasi_lecturers";
    protected $fillable = ['disertasi_id','lecturer_id','position','approve'];

    public function disertasi(){
        return $this->belongsTo(Disertasi::class);
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
}
