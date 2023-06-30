<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable =
    [
        'title', 'description', 'image', 'source', 'documents',
    ];

    protected $table = 'knowledge';
}
