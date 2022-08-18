<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mpDetail extends Model
{
    use HasFactory;


    public function parlament_seat()
    {
        return $this->belongsTo(parlament_seat::class,'p_id','id');
    }

}
