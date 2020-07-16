<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitworkTrades extends Model
{
    protected $fillable=[
            'TradeId',
            'TransactionId',
            'Client',
            'Trader',
            'AmountSold',
            'AmountBought',
            'Status',
    ];
}
