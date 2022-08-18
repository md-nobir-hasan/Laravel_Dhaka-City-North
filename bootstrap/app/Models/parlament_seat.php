<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parlament_seat extends Model
{
    use HasFactory;
    protected $table = 'parlament_seat';
    public $timestamp = false;
}
