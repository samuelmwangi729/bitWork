<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable=[
        'UserId',
        'ProjectId',
        'ProposalDescription',
        'ProjectTimespan',
        'Budget',
        'PaidBy',
        'Resume',
        'Status',
    ];
}
