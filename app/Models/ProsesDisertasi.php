<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesDisertasi extends Model
{
    use HasFactory;
    protected $table = "proses_disertasis";
    protected $fillable = ['name','upload_lots','link_lots','terms_id'];

}
