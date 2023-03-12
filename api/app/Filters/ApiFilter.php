<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams = array();

    protected $columnMap = array();

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

    public function transform(Request $request)
    {
        $eloQuery = array();

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = array(
                        $column,
                        $this->operatorMap[$operator],
                        $this->operatorMap[$operator] == 'like' ?
                        '%' . $query[$operator] . '%' : $query[$operator]
                    );
                }
            }
        }

        return $eloQuery;
    }
}