<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $id, $message;
    public function render()
    {
        $messages = Message::with('customer')->paginate(3);
        return view('livewire.messages', compact('messages'));
    }

    public function deleteMessage(int $id){
        $message = Message::find($id);
        if($message){
            $this->id = $message->id;
            $this->message = $message->message;
        } else {
            return redirect()->back();
        }
    }

    public function destroyMessage(){
        $message = Message::find($this->id);
        $message->delete();
        session()->flash('message', 'message delete success');
        $this->resetInput();
        $this->dispatch('close-modal');
    } 

    public function closeModal(){
        $this->resetInput();
    }

    public function resetInput(){
        $this->id = '';
        $this->message = '';
    }
}
