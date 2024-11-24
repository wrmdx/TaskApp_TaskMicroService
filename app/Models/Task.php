<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'status', 'priority', 'due_date', 'assigned_user_id', 'created_by', 'updated_by', 'project_id'];

}
