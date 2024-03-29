<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

// class AdminPostController extends Controller
// {
//     public function index()
//     {
//         return view('admin.posts.index', [
//             'posts' => Post::paginate(50)
//         ]);
//     }

//     public function create()
//     {
//         return view('admin.posts.create');
//     }

//     // public function store()
//     // {
//     //     Post::create(array_merge($this->validatePost(), [
//     //         'user_id' => request()->user()->id,
//     //         'thumbnail' => request()->file('thumbnail')->store('thumbnails')
//     //     ]));

//     //     return redirect('/');
//     // }

//     public function store()
//     {
//         // Create the post
//         $post = Post::create(array_merge($this->validatePost(), [
//             'user_id' => request()->user()->id,
//             'thumbnail' => request()->file('thumbnail')->store('thumbnails')
//         ]));

//         // Attach tags to the post
//         $tags = request('tags'); // Assuming you have a 'tags' input field in your form.
//         $post->tags()->attach($tags);

//         return redirect('/');
//     }

//     public function edit(Post $post)
//     {
//         return view('admin.posts.edit', ['post' => $post]);
//     }

//     public function update(Post $post)
//     {
//         $attributes = $this->validatePost($post);

//         if ($attributes['thumbnail'] ?? false) {
//             $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//         }

//         $post->update($attributes);

//         // Sync (attach/detach) tags for the post
//         $tags = request('tags'); // Assuming you have a 'tags' input field in your form.
//         $post->tags()->sync($tags);


//         return back()->with('success', 'Post Updated!');
//     }

//     public function destroy(Post $post)
//     {
//         $post->delete();

//         return back()->with('success', 'Post Deleted!');
//     }

//     protected function validatePost(?Post $post = null): array
//     {
//         $post ??= new Post();

//         return request()->validate([
//             'title' => 'required',
//             'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
//             'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
//             'excerpt' => 'required',
//             'body' => 'required',
//             'category_id' => ['required', Rule::exists('categories', 'id')]
//         ]);
//     }
// }


use Inertia\Inertia;

class AdminPostController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/posts/Index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return Inertia::render('admin/posts/Create');
    }

    public function store()
    {
        $post = Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        $tags = request('tags');
        $post->tags()->attach($tags);

        return Inertia::location(route('admin.posts.index'))->with('success', 'Post Created!');
    }

    public function edit(Post $post)
    {
        return Inertia::render('admin/posts/Edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        $tags = request('tags');
        $post->tags()->sync($tags);

        return Inertia::location(route('admin.posts.index'))->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return Inertia::location(route('admin.posts.index'))->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
