<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // the columns in the database and used
    protected $fillable = ['title', 'completed', 'priority', 'status', 'description'];
}
