<?php

namespace App\Models;

use App\Enums\TasksStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','status'];

    //DEFAUT VALUES
    protected $attributes = [
        'status' =>TasksStatus::PENDING,
    ];
}
