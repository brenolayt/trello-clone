<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todoCard extends Model
{
    protected $table = 'todo_cards';

    protected $fillable = [
        "todo_id",
        "user_id",
        "text",
    ];

    public function todo(){
        return $this->belongsTo(todo::class, 'todo_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
