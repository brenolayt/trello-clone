<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{   
    protected $table = 'todos';

    protected $fillable = [
        "title",
        "user_id",
    ];


    public function author(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function cards(){
        return $this->hasMany(todoCard::class, "todo_id");
    }
}
