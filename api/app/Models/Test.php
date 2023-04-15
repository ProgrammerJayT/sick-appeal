<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $primaryKey = 'test_id';
    protected $guarded = [];
    use HasFactory;
}