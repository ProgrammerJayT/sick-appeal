<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Randomizer extends Controller
{
    //
    public function randomizeIdentity()
    {
        //Get last 2 digits of the year, and convert to int
        $idNumberMin = (int) substr(date('Y'), -2) + 229999977;
        $idNumberMax = (int) substr(date('Y'), -2) + 239999976;

        $id = fake()->unique()->numberBetween($idNumberMin, $idNumberMax);

        return $id;
    }
}