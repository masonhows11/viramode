<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'path',
        'link'
    ];
}
