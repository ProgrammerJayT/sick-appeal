<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSickTest extends Model
{
    protected $primaryKey = 'student_sick_test_id';
    protected $guarded = [];
    use HasFactory;
}