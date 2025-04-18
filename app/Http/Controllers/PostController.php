<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class PostController extends Controller
{

    public function index()
    {
        return view('pages.post');
    }
    public function addPost()
    {
        return view('pages.addPost');
    }

    public function editPost(Post $post)
    {
        $post = Post::find($post);
        return view('pages.editPost', compact('post'));
    }
}
