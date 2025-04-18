<?php

namespace App\Livewire\Form;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPostForm extends Component
{

    use WithFileUploads;


    #[Validate('required|min:3|max:255')]
    public $title;

    #[Validate('required|min:3|max:255')]
    public $post;

    #[Validate('file|mimes:png,jpg,pdf|max:1024|nullable')]
    public $image;


    public $oldImage;


    public $postData;

    public function mount($postData)
    {
        $this->title = $postData[0]->title;
        $this->post = $postData[0]->text;
        $this->oldImage = $postData[0]->image;
    }

    public function save()
    {
        $this->validate();

        $currentPost = Post::findOrFail($this->postData[0]->id);

        if ($this->image == null) {
            $imagePath = $this->oldImage;
        } else {

            if ($currentPost && Storage::disk('project')->exists($currentPost->image)) {
                Storage::disk('project')->delete($currentPost->image);
                $imagePath = $this->image->store(path: 'posts');
            }
        }

        $currentPost->update([
            'title' => $this->title,
            'text' => $this->post,
            'image' => $imagePath,

        ]);

        $this->reset();

        return redirect()->route('posts')
            ->with('success', 'Post Updatet Successfully');
    }


    public function resetData()
    {
        $this->title = "";
        $this->post = "";
        $this->image = "";
    }


    public function render()
    {
        return view('livewire.form.edit-post-form');
    }
}
