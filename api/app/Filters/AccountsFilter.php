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

    protected $operatorMap = array(
        //equal
        'eq' => '=',
        //not equal
        'ne' => '!=',
        //greater than
        'gt' => '>',
        //greater than or equal
        'gte' => '>=',
        //less than
        'lt' => '<',
        //less than or equal
        'lte' => '<=',
        //like
        'like' => 'like',
        //not like
        'nlike' => 'not like',
        //in
        'in' => 'in',
        //not in
        'nin' => 'not in',
        //partial match

    );
}