<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}