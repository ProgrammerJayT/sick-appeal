<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class TestsFilter extends ApiFilter
{
    protected $safeParams = array(
        'lecturerId' => array(
            'eq',
        ),
        'moduleId' => array(
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
        'type' => array(
            'eq',
            'like',
            'ne'
        ),
        'status' => array(
            'eq',
            'ne',
        ),
    );

    // For camel cased params
    protected $columnMap = array(
        'moduleId' => 'module_id',
        'lecturerId' => 'lecturer_id',
    );
}