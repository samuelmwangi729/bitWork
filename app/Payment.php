<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
       'PaymentId',
       'Freelancer',
       'Client',
       'ProjectId',
       'Amount',
       'DateReleased',
       'Processed',
    ];
}
