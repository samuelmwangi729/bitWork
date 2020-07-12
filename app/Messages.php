<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable=[
        'From',
        'To',
        'Message',
        'Project',
        'ChatId',
        'Attachment',
    ];
}
