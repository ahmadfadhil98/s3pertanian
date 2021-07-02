<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marking extends Model
{
    use HasFactory;

    protected $table = "markings";
    protected $fillable = ['lecturer_id','academic_id','score','grade','keterangan'];

    public function lecturer_id(){
        return $this->belongsTo(Lecturer::class);
    }

    public function academic(){
        return $this->belongsTo(Academic::class);
    }
}
