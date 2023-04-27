<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class RegistrationsFilter extends ApiFilter
{

    protected $safeParams = array(
        'year' => array(
            'eq',
            'gt',
            'lt',
            'gte',
            'lte'
        ),

        'courseId' => array(
            'eq'
        ),

        'studentId' => array(
            'eq'
        ),

        'status' => array(
            'eq',
            'ne'
        )
    );

    //For camel cased params
    protected $columnMap = array(
        'courseId' => 'course_id',
        'studentId' => 'student_id',
    );
}