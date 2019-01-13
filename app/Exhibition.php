<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $fillable = [
        'title',
        'details',
        'date',
        'time',
        'venue',
        'address',
        'img',
    ];
}
