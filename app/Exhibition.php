<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    protected $fillable = [
        'title',
        'details',
        'order_date',
        'date',
        'time',
        'venue',
        'address',
        'img',
    ];

    protected $dates = [
        'order_date',
    ];
}
