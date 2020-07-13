<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HourTracker extends Model
{
    protected $fillable=[
        'ProjectId',
        'Hours',
        'Amount',
        'Status',
    ];
}
