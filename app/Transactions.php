<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $fillable = [
        'email',
        'points',
    ];
}
