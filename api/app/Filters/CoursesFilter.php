<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class CoursesFilter extends ApiFilter
{
    protected $safeParams = array(
        'name' => array(
            'eq',
            'like'
        ),
    );
}