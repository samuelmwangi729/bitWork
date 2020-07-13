<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public $fillable=[
        'UserId',
        'Skills',
       'PaymentAddress',
        'Description',
    ];
}
