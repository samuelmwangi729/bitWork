<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitworkUsd extends Model
{
    protected $fillable=[
            'TransactionId',
            'SourcePlatform',
            'UserId',
            'Amount',
            'Status',
    ];
}
