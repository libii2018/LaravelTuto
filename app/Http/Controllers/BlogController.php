<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View {
        return view('blog.index',[
            'posts'=> Post::paginate(1)
        ]);
    }

    public function create() {
        return view('blog.create');
    }

    public  function store(CreatePostRequest $request) {
        $post = Post::create($request->validated());

        return redirect()->route('blog.show',['slug' => $post->slug, 'post' => $post->id])->with('success',"L'article a bien ete sauvegarde");
    }

    public function show(string $slug, Post $post) : RedirectResponse | View { 
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug'=> $post->slug,'id'=> $post->id]);
        }
        return view('blog.show',[
            'post' => $post
        ]);
    }
}