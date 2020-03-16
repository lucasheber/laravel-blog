<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(15);
        dd($posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = 1;
        $data['is_active'] = true;

        dd(Post::create($data));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        dd($post);
    }
}
