<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $table = "academics";
    protected $fillable = ['proses_disertasi_id','kode_proses_disertasi','disertasi_id','link/upload'];

    public function proses_disertasi(){
        return $this->belongsTo(ProsesDisertasi::class);
    }

    public function disertasi(){
        return $this->belongsTo(Disertasi::class);
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class,'academic_id','id');
    }
}
