<?php

namespace App\Filters;

use App\Filters\ApiFilter;

class ModulesFilter extends ApiFilter
{
    protected $safeParams = array(
        'name' => array(
            'eq',
            'like'
        ),
        'code' => array(
            'eq',
            'like'
        ),
    );
}