<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentsPlatforms extends Model
{
    //
    protected $fillable=[
        'Platform',
        'Address'
    ];
}
