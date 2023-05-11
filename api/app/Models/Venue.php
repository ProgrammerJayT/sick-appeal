<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $primaryKey = 'venue_id';
    protected $guarded = [];
    use HasFactory;
}
