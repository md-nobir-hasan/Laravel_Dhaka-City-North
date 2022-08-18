<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class u_model extends Model
{
    use HasFactory;
    protected $table = 'units';
    public $timestamp = false;
}
