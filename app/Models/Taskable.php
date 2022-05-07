<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskable extends Model
{
    use HasFactory;
    public function projects()
    {
        return $this->belongsToMany(Project::class,'taskables');
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class,'taskables');
    }

}
