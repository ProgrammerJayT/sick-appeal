<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lecturer extends Model
{
    protected $primaryKey = 'lecturer_id';
    protected $guarded = [];
    use HasFactory;
}