<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $table = "academics";
    protected $fillable = ['proses_disertasi_id','type','no','disertasi_id','file_link','path','keterangan','mark'];

    public function proses_disertasi(){
        return $this->belongsTo(ProsesDisertasi::class);
    }

    public function disertasi(){
        return $this->belongsTo(Disertasi::class);
    }

    public function marking(){
        return $this->hasMany(Marking::class,'academic_id','id');
    }
}
