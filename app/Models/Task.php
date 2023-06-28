<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'deadline', 'status', 'folder_id'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}