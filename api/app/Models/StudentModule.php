<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModule extends Model
{
    protected $primaryKey = 'student_module_id';
    protected $guarded = [];
    use HasFactory;
}