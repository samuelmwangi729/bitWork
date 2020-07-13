<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable=[
        'ProjectId',
        'Name',
        'Amount',
        'Status',
    ];
}
