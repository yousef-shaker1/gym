<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $id, $comment;
    public function render()
    {
        $comments = Comment::paginate(5);
        return view('livewire.comments', compact('comments'));
    }

    public function deleteComment(int $id){
        $comment = Comment::find($id);
        if($comment){
            $this->id = $comment->id;
            $this->comment = $comment->comment;
        } else {
            return redirect()->back();
        }
    }

    public function destroyComment(){
        $comment = Comment::find($this->id);
        $comment->delete();
        session()->flash('message', 'comment delete success');
        $this->resetInput();
        $this->dispatch('close-modal');
    } 

    public function closeModal(){
        $this->resetInput();
    }

    public function resetInput(){
        $this->id = '';
        $this->comment = '';
    }
}
