<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Posts extends Component
{
    use WithPagination, WithFileUploads;
    public $id, $img, $title, $description;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $posts = post::paginate(4);
        return view('livewire.posts', compact('posts'));
    }
    
    public function rules(){
        return [
            'img' => 'required|image',
            'title' => 'required|max:80',
            'description' => 'required|min:10|max:1000',
        ];
    }

    
    public function updateRules(){
        return [
            'img' => 'nullable',
            'title' => 'nullable|max:80',
            'description' => 'nullable|min:10|max:1000',
        ];
    }

    public function saveSection(){
        $validatedate = $this->validate();
        $path = $this->img->store('post', 'public');
        post::create([
            'img' => $path,
            'title' => $validatedate['title'],
            'Written_by' => Auth::user()->name,
            'date' => now(),
            'description' => $validatedate['description'],
        ]);

        session()->flash('message', 'post created success');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function editPost(int $id){
        $post = post::findorfail($id);
        if($post){
            $this->id = $post->id;
            $this->img = $post->img;
            $this->description = $post->description;
            $this->title = $post->title;
        } else {
            return redirect()->back();
        }
    }

    
    
    public function updatePost()
    {
        $validator = $this->validate($this->updateRules());
        $post = post::find($this->id);
        if ($this->img instanceof UploadedFile) {
            // Delete the old image if it exists
            if (!empty($post->img) && Storage::disk('public')->exists($post->img)) {
                Storage::disk('public')->delete($post->img);
            }
            // Store the new image
            $path = $this->img->store('post', 'public');
            $post->img = $path;
        }
        $post->title = $validator["title"];
        $post->description = $validator["description"];
        $post->save();
        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'post updated Successfully');
    }
    
    public function deletePost(int $id){
        $team = post::find($id);
        if($team){
            $this->id = $team->id;
            $this->title = $team->title;
        } else {
            return redirect()->back();
        }
    }

    public function destroyStudent(){
        $post = post::find($this->id);
        if (!empty($post->img) && Storage::disk('public')->exists($post->img)) {
            Storage::disk('public')->delete($post->img);
        }
        $post->delete();
        session()->flash('message', 'section deleted Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();    
    }
    
    public function resetInput()
    {
        $this->title = '';
        $this->img = '';
        $this->description = '';
    }
}
