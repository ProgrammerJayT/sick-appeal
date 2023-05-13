<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class ScheduleFilter extends ApiFilter
{

    protected $safeParams = array(
        'moduleId' => array(
            'eq',
        ),

        'lecturerId' => array(
            'eq'
        ),

        'day' => array(
            'eq',
            'lk',
            'gt',
            'gte',
            'lt',
            'lte',
            'ne'
        ),
    );

    //For camel cased params
    protected $columnMap = array(
        'moduleId' => 'module_id',
        'lecturerId' => 'lecturer_id',
    );
}
