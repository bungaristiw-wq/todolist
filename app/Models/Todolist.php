<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'todolist';

    protected $fillable = [
        'user_id',
        'nama_list',
        'description'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
