<?php

namespace App;

class Comment extends CoreModel
{
    public function post()
    {
    	return $this->belongTo(Post::class);
    }
}
