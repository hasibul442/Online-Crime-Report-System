<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $tabel='categories';
    protected $fillable = [
        'id',
        'name',
        // 'image',
        // 'status',
        // 'slug',
        'parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
