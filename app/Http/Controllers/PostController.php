<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        return Post::all();
    }
    
    public function store(Request $request)
    {
        return Post::create($request->all());
    }
    
    public function show($id)
    {
        return Post::findOrFail($id);
    }
    
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post-> update($request->all());
        return $post;
    }

    public function detroy($id)
    {
        Post::destroy($id);
        return response()->json (['messeage'=>'Deleted']);
    }
}
