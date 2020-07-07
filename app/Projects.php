<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable=[
        'ProjectId','ProjectTitle','Slug','Description','ClientId',
        'Budget','Status','AwardedTo','Collaborated','Bids','Expired',
    ];
}
