<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \Carbon\Carbon;

class PostController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::latest();

        // if ($month = request("month"))
        // {
        //     $posts->whereMonth("created_at","=",Carbon::parse($month)->month);
        // }

        // if ($year = request("year"))
        // {
        //     $posts->whereYear("created_at","=",$year);
        // }

        /*也可以像下面这样做 要在Post Model中创建一个scopeFilter  方法
            这个filter  可以使用任何代替
        */

        $posts = Post::latest()->filter(request(['year','month']))->get();

        // $posts = $posts->get();
        // $published = Post::selectRaw("year(`created_at`) as year, monthname(`created_at`) as month ,count(*) as published")->groupBy("month","year")->orderByRaw("min(created_at)")->get()->toArray();
        // dd($published);
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( request(), [
            "title" => "required|min:20",
            "body"  => "required"
        ]);

        Post::create(request(["title", "body", "complete"]));
        return redirect("posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
