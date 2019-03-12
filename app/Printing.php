<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Printing extends Model

{
    public $table = 'CreatePrintingsTable';

    protected $fillable = [
        'title',
        'year',
        'size',
        'details',
        'img',
    ];
}
