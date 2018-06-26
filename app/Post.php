<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends CoreModel
{
    // protected $fillable = ["title", "body", "complete"];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
