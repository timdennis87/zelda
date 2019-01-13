<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
