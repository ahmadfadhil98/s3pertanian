<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisertasiTopic extends Model
{
    use HasFactory;
    protected $table = "disertasi_topics";
    protected $fillable = ['name'];

    public function disertasi(){
        return $this->hasMany(Disertasi::class,'topic_id','id');
    }

}
