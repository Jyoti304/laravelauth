<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_created(){

        return view('emails.post_created');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create($request->all());
         
        event(new PostCreated($post));// dispatch event from here

        return redirect()->route('posts.index')->with('success','Post Created Successfully');
             

    }
}
