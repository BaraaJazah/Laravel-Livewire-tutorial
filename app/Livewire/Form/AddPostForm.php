<?php

namespace App\Livewire\Form;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPostForm extends Component
{

    use WithFileUploads;


    #[Validate('required|min:3|max:255')]
    public $title;

    #[Validate('required|min:3|max:255')]
    public $post;

    #[Validate('file|mimes:png,jpg,pdf|max:1024')]
    public $image;


    public function save()
    {

        $this->validate();
        $imagePath = $this->image->store(path: 'posts');

        Post::create([
            'title' => $this->title,
            'text' => $this->post,
            'image' => $imagePath,
        ]);

        $this->reset();

        return redirect()->back()
            ->with('success', 'Post Created Successfully');
    }

    public function update()
    {
        dd($this->postData->title);
    }




    public function render()
    {
        return view('livewire.form.add-post-form');
    }
}
