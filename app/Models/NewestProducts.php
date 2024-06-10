<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewestProducts extends Model
{
    use HasFactory;

    protected $table = 'newest_products';
    protected $fillable = [
        'title',
        'slug',
        'status',
        'image_path',
        'url',
    ];
}
