<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printing extends Model
{
    protected $fillable = [
        'title',
        'year',
        'size',
        'details',
        'img',
    ];
}
