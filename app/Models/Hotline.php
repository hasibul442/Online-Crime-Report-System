<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotline extends Model
{
    use HasFactory;
    protected $tabel='hotlines';
    protected $fillable = [
        'title',
        'phone_number',
        'description',
        'slug',
    ];
}
