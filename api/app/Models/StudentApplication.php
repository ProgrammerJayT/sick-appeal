<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    protected $primaryKey = 'student_application_id';
    protected $guarded = [];
    use HasFactory;
}