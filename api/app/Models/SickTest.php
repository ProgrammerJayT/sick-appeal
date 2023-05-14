<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SickTest extends Model
{
    protected $primaryKey = 'sick_test_id';
    protected $guarded = [];
    use HasFactory;
}
