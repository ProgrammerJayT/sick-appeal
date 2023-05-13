<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $primaryKey = 'session_id';
    protected $guarded = [];
    use HasFactory;
}
