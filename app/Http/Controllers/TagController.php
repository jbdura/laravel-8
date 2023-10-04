<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index', [
            'tags' => Tag::all(),
        ]);
    }

    public function show(Tag $tag)
    {
        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts,
        ]);
    }
}
