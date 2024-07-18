<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Sections extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $id;
    public $name;
    public $img;

    public function render()
    {
        $sections = Section::paginate(5);
        return view('livewire.sections',compact('sections'));
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:20',
            'img' => 'required|image',
        ];    
    }

    protected function updateRules()
    {
        return [
            'name' => 'nullable|min:2|max:20',
            'img' => 'nullable',
        ];
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function editSection(int $id)
    {
        $section = Section::find($id);
        if($section){
            $this->name = $section->name;
            $this->img = $section->img;
            $this->id = $section->id;
        } else {
            return redirect()->back();
        }
    }


    public function deleteSection(int $id)
    {
        $section = section::find($id);
        if($section){
            $this->name = $section->name;
            $this->id = $section->id;
        } else {
            return redirect()->back();
        }
    }


    public function saveSection(){
        $validateData = $this->validate();
        $path = $this->img->store('section', 'public');
        section::create([
            'img' => $path,
            'name' => $validateData['name'],
        ]);
        session()->flash('message', 'section created Successfully');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function updateStudent()
    {
        $validator = $this->validate($this->updateRules());
        $section = section::find($this->id);
        // Check if a new image is provided
        if ($this->img instanceof UploadedFile) {
            // Delete the old image if it exists
            if (!empty($section->img) && Storage::disk('public')->exists($section->img)) {
                Storage::disk('public')->delete($section->img);
            }
    
            // Store the new image
            $path = $this->img->store('section', 'public');
            $section->img = $path;
        }
        
        // Update section name
        $section->name = $validator["name"];
        $section->save();
        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'section updated Successfully');
    }

    public function destroyStudent(){
        $section = Section::find($this->id);
        if (!empty($section->img) && Storage::disk('public')->exists($section->img)) {
            Storage::disk('public')->delete($section->img);
        }
        $section->delete();
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
        $this->img = '';
        $this->name = '';
    }
}
