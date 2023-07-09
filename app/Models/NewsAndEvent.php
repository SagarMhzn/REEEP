<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsAndEvent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'date'];

    protected  $table = 'news_and_events';

    protected $guarded = [];

    public $timestamps = true;
}
