<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mcq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'a', 'b', 'c', 'd', 'correct_ans', 'admin_id', 'quiz_id', 'category_id'
    ];

    public function admin() {
        return $this->belongsTo(Admin::class);
    }


    function Quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
