<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesDisertasi extends Model
{
    use HasFactory;
    protected $table = "proses_disertasis";
    protected $fillable = ['name','link_lots','file_lots','terms_id'];

    public function terms(){
        return $this->belongsTo(ProsesDisertasi::class);
    }

    public function student(){
        return $this->hasMany(ProsesDisertasi::class,'terms_id','id');
    }

    public function academic(){
        return $this->hasMany(Academic::class,'academic_id','id');
    }
}
