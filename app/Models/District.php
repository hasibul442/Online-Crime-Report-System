<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = ['division_id',
    'name',
    'bn_name',
    'lat',
    'lon',
    'url'];

    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }
}
