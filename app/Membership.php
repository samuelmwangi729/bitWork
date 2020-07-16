<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable=[
        'UserId',
        'MemberType',
        'Registered',
        'Expired',
        'Status',
    ];
}
