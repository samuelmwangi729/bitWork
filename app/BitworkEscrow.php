<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitworkEscrow extends Model
{
    protected  $fillable=[
        'ProjectId',
        'Client',
        'Freelancer',
        'Amount',
        'Status'
    ];
}
