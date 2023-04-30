<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerModule extends Model
{
    protected $primaryKey = 'lecturer_module_id';
    protected $guarded = [];
    use HasFactory;
}