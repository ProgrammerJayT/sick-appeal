<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    protected $primaryKey = 'appeal_id';
    protected $guarded = [];
    use HasFactory;
}