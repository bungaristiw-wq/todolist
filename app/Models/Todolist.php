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
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'todolist_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
