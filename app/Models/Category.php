<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function quizzes(){
        return $this->hasMany(Quiz::class);
    }
}
