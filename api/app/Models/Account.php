<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    protected $primaryKey = 'account_id';
    protected $guarded = [];
    use HasFactory;
}