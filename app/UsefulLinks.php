<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsefulLinks extends Model
{
    protected $fillable = [
        'name',
        'url',
        'is_active',
    ];
}
