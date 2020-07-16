<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitworkProfit extends Model
{
    protected  $fillable=[
        'TransactionId',
        'ProjectId',
        'Amount',
        'Description',
        'Status'
    ];
}
