<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    protected $primaryKey = 'student_test_id';
    protected $guarded = [];
    use HasFactory;
}