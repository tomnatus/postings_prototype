<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        //Eager Loading --> minder queries nodig !!
        $posts = Post::with('user','likes')->paginate(20);
        return view ('posts.index', [
            'posts'=> $posts
        ]);
    }

    public function store(Request $request) {
        
        $this->validate($request , [
            'body'=> 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body])
        ;

        return back();
    }

    public function destroy(Post $post) {
        // debug gedoe
        //dd($post);

        $post->delete();
        return back();
    }
}
