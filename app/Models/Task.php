<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

protected $table = 'tasks';

protected $fillable = [
    'todolist_id',
    'judul_task',
    'description',
    'is_done'
];


    public function todolist()
    {
        return $this->belongsTo(Todolist::class);
    }
}
