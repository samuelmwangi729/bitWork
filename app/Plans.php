<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected  $fillable=[
        'Profile',
        'Amount',
        'Status'
    ];
}
