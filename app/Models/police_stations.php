<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class police_stations extends Model
{
    use HasFactory;
    protected $table = 'police_stations';
    public $timestamp = false;
}
