<?php

namespace App\Models;

use App\Models\Mcq;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'creator'
    ];
    function category(){
        return $this->belongsTo(Category::class);
    }
    function Mcq(){
        return $this->hasMany(Mcq::class);

    }
    function Records(){
        return $this->hasMany(Record::class);
        
    }
}
