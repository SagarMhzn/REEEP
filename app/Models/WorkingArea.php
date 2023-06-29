<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,'description','logo'
    ];

    protected $table = 'working_areas';

    protected $guarded =[];
}
