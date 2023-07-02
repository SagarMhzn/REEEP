<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'banners';

    protected $fillable = [
        'title', 'banner_order', 'caption', 'banner_file',
    ];
}