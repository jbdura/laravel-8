<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author', 'tag']))->paginate(8),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category')),
        ]);
    }

    public function show_one(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function show(Post $post)
    {
        $post_tags = Post::find($post->id)->tags;
        return Inertia::render('Posts/Show', [
            'post' => $post,
            'post_tags' => $post_tags,
        ]);
    }


    public function create()
    {
        return Inertia::render('Posts/Create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $attributes['user_id'] = auth()->id();
        $new_post = Post::create($attributes);
        $tagNames = explode(',', request()->tags);

        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $new_post->tags()->attach($tag->id);
        }
        $new_post->save();

        return to_route('posts.show', $new_post);
    }
}