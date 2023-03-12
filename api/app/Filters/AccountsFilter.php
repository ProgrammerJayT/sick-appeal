<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class AccountsFilter extends ApiFilter
{

    protected $safeParams = array(
        'email' => array(
            'eq', 'like'
        ),
        'role' => array(
            'eq', 'ne', 'like'
        ),
    );

    //For camel cased params
    // protected $columnMap = array(
    //     'postalCode' => 'postal_code',
    // );
}