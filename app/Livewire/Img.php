<?php

namespace App\Livewire;

use App\Models\photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Img extends Component
{
    use WithFileUploads;

    public $id;
    public $img;

    public function render()
    {
        $photos = photo::get();
        return view('livewire.img', compact('photos'));
    }

    public function rules()
    {
        return [
            'img' => 'required|image',
        ];
    }

    public function saveImg()
    {
        $validatedData = $this->validate([
            'img' => 'required|image',
        ]);

        $path = $this->img->store('client', 'public');
        
        photo::create([
            'img' => $path,
        ]);

        session()->flash('message', 'Image created successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }
    public function editImg(int $id){
        $photo = photo::find($id);
        if($photo){
            $this->id = $photo->id;
            $this->img = $photo->img;
        } else {
            return redirect()->back();
        }
    }
    
    public function updateImg()
    {
        $validator = $this->validate();
        $photo = photo::find($this->id);
        // Check if a new image is provided
        if ($this->img instanceof UploadedFile) {
            // Delete the old image if it exists
            if (!empty($photo->img) && Storage::disk('public')->exists($photo->img)) {
                Storage::disk('public')->delete($photo->img);
            }
            // Store the new image
            $path = $this->img->store('client', 'public');
            $photo->img = $path;
        }
        
        $photo->save();
        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'image updated Successfully');
    }
    
    public function deleteImg(int $id){
        $photo = photo::find($id);
        if($photo){
            $this->id = $photo->id;
            $this->img = $photo->img;
        } else {
            return redirect()->back();
        }
    }

    public function destroyImage(){
        $photo = photo::find($this->id);
        if (!empty($photo->img) && Storage::disk('public')->exists($photo->img)) {
            Storage::disk('public')->delete($photo->img);
        }
        $photo->delete();
        session()->flash('message', 'image deleted Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();    
    }
    
    public function resetInput()
    {
        $this->img = '';
    }
}
