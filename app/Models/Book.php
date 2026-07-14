<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title","summary","author",'slug',"status","file"];


    public function getRouteKeyName(){
    return 'slug';
    }
}


