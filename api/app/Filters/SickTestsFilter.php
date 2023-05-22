<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class SickTestsFilter extends ApiFilter
{
    protected $safeParams = array(
        'testId' => array(
            'eq',
        ),
        'venueId' => array(
            'eq',
        ),
        'date' => array(
            'eq',
            'ne',
            'gt',
            'lt',
            'gte',
            'lte'
        ),
        'time' => array(
            'eq',
            'ne',
            'gt',
            'lt',
            'gte',
            'lte'
        ),
    );

    // For camel cased params
    protected $columnMap = array(
        'testId' => 'test_id',
        'venueId' => 'venue_id',
    );
}
