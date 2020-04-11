<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /** @var Post */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();

        try {
            $data['is_active'] = true;

            /** @var User */
            $user = auth()->user();

            if ($request->hasFile('thumb')) {
                $data['thumb'] = $request->file('thumb')->store('thumbs', 'public');
            } else {
                unset($data['thumb']);
            }

            $post = $user->posts()->create($data);
            $post->categories()->sync($data['categories']);

            flash('Postagem criada com sucesso!')->success();
            return redirect()->route('posts.index');

        } catch (\Exception $e) {
            $message = "Erro ao criar a postagem";

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            flash($message)->warning();

            return redirect()->back();
        }

    }

    public function show(Post $post)
    {
        $categories = Category::all(['id', 'name']);
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();

        try {
            if ($request->hasFile('thumb')) {
                Storage::disk('public')->delete($post->thumb);
                $data['thumb'] = $request->file('thumb')->store('thumbs', 'public');
            } else {
                unset($data['thumb']);
            }

            $post->update($data);
            $post->categories()->sync($data['categories']);

            flash("Postagem atualizada!")->success();
            return redirect()->route('posts.show', ['post' => $post->id]);

        } catch (\Exception $e) {

            $message = "Erro ao atualizar a postagem!";

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }

    public function destroy(Post $post)
    {

        try {
            $post->delete();

            flash("Postagem '{$post->title}' removido!")->success();
            return redirect()->route('posts.index');

        } catch (\Exception $e) {
            $message = "Postagem '{$post->title}' não removido";

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            flash($message)->warning();
            return redirect()->back();
        }
    }
}
