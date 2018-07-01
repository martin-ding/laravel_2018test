<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends CoreModel
{
    // protected $fillable = ["title", "body", "complete"];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, $filter)
    {
        if ($month = $filter["month"])
        {
            $query->whereMonth("created_at","=",Carbon::parse($month)->month);
        }

        if ($year = $filter["year"])
        {
            $query->whereYear("created_at","=",$year);
        }

        return $query;
    }

    public static function archives()
    {
        $archives = self::selectRaw("year(`created_at`) as year, monthname(`created_at`) as month ,count(*) as published")->groupBy("month","year")->orderByRaw("min(created_at)")->get()->toArray();
        return $archives; 
    }
}
