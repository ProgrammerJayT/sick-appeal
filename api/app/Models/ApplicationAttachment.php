<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationAttachment extends Model
{
    protected $primaryKey = 'application_attachment_id';
    protected $guarded = [];
    use HasFactory;
}
