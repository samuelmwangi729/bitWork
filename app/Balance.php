<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable=[
            'UserId',
            'Balance',
            'Status',
    ];
}
