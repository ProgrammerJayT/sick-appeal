<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AccountsFilter extends ApiFilter
{

    protected $safeParams = array(
        'email' => array(
            'eq',
            'like'
        ),
        'type' => array(
            'eq',
            'ne',
            'like'
        ),
        'status' => array(
            'eq',
            'ne',
        ),
        'email_verified' => array(
            'eq',
            'ne',
        ),
    );

    protected $columnMap = array(
        'emailVerified' => 'email_verified'
    );
}