<?php

namespace App\Filters;
use App\Filters\ApiFilter;

class LecturersFilter extends ApiFilter
{
    protected $safeParams = array(
        'name' => array(
            'eq',
            'like'
        ),
        'surname' => array(
            'eq',
            'like'
        ),
    );

    //For camel cased params
    // protected $columnMap = array(
    //     'postalCode' => 'postal_code',
    // );
}