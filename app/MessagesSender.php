<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessagesSender extends Model
{
    protected $fillable=[
        'To',
        'From',
        'Status',
        'ChatId'
    ];
}
