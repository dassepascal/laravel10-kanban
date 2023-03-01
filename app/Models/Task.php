<?php

namespace App\Models;

use App\Enums\TasksStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','status'];

    //DEFAULT VALUES
    protected $attributes = [
        'status' =>TasksStatus::PENDING,
    ];

    // scopes status
    public function scopePending($query)
    {
        return $query->where('status', TasksStatus::PENDING);
    }
  // scopes status is  in progress
    public function scopeInProgress($query)
    {
        return $query->where('status', TasksStatus::IN_PROGRESS);
    }
      // scopes status is done
    public function scopeDone($query){
        return $query->where('status', TasksStatus::DONE);}

}
