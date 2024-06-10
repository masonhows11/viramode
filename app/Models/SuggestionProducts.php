<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestionProducts extends Model
{
    use HasFactory;
    protected $table = 'suggestion_products';
    protected $attributes = ['status' => 1];
    protected $fillable = [
        'title',
        'image_path',
        'slug',
        'status',
        'price',
    ];
}
