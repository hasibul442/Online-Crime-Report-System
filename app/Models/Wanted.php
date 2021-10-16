<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wanted extends Model
{
    use HasFactory;
    protected $tabel='wanteds';
    protected $fillable = ['name',
    'father_name',
    'address',
    'gander',
    'photo',
    'details',
    'status'];
}
