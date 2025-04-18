<?php

namespace App\Livewire\Home;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;


    public function delete($id)
    {
        $postData = Post::findOrFail($id);

        if ($postData && Storage::disk('project')->exists($postData->image)) {
            Storage::disk('project')->delete($postData->image);
        }
        $postData->delete();

        return redirect()->back()
            ->with('success', 'Post Deleted Successfully');
    }


    public function placeholder()
    {
        // return view('livewire.placeholders.skeleton');
        return view('skeleton.loadPost');
    }




    public function render()
    {
        $posts = Post::paginate(4);

        return view('livewire.home.posts', compact('posts'));
    }
}
