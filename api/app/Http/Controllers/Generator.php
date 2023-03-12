<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Generator extends Controller
{
    //
    public function generateIdentity()
    {

        //Get last 2 digits of the year, and convert to int
        $identityNumberMin = (int) substr(date('Y'), -2) + 229999977;
        $identityNumberMax = (int) substr(date('Y'), -2) + 239999976;

        $identity = fake()->unique()->numberBetween($identityNumberMin, $identityNumberMax);

        return $identity;
    }
}