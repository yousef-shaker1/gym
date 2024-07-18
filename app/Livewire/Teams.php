<?php

namespace App\Livewire;

use App\Models\Team;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Teams extends Component
{
    use WithPagination, WithFileUploads;
    public $id, $name ,$age, $section_id, $img;
    public function render()
    {
        $teams = Team::paginate(5);
        $sections = Section::get();
        return view('livewire.teams', compact('teams', 'sections'));
    }
    
    public function rules(){
        return [
            'name' => 'required|min:3|max:20',
            'age' => 'required|numeric|between:18,70',
            'img' => 'required|image',
            'section_id' => 'required',
        ];
    }
    
    public function updateRules(){
        return [
            'name' => 'nullable|min:3|max:20',
            'age' => 'nullable|numeric|between:18,70',
            'img' => 'nullable',
            'section_id' => 'nullable',
        ];
    }

    public function saveSection(){
        $validatedate = $this->validate();
        $path = $this->img->store('team', 'public');
        Team::create([
            'img' => $path,
            'name' => $validatedate['name'],
            'age' => $validatedate['age'],
            'section_id' => $validatedate['section_id'],
        ]);

        session()->flash('message', 'caption created success');
        $this->resetInput();
        $this->dispatch('close-modal');
    }

    public function editSection(int $id){
        $team = Team::find($id);
        if($team){
            $this->id = $team->id;
            $this->name = $team->name;
            $this->age = $team->age;
            $this->img = $team->img;
            $this->section_id = $team->section_id;
        } else {
            return redirect()->back();
        }
    }
    
    public function updateStudent()
    {
        $validator = $this->validate($this->updateRules());
        $team = Team::find($this->id);
        // Check if a new image is provided
        if ($this->img instanceof UploadedFile) {
            // Delete the old image if it exists
            if (!empty($team->img) && Storage::disk('public')->exists($team->img)) {
                Storage::disk('public')->delete($team->img);
            }
            
            // Store the new image
            $path = $this->img->store('team', 'public');
            $team->img = $path;
        }
        
        // Update section name
        $team->name = $validator["name"];
        $team->age = $validator["age"];
        $team->section_id = $validator["section_id"];
        $team->save();
        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'caption updated Successfully');
    }
    
    public function deleteSection(int $id){
        $team = Team::find($id);
        if($team){
            $this->id = $team->id;
            $this->name = $team->name;
        } else {
            return redirect()->back();
        }
    }

    public function destroyStudent(){
        $team = Team::find($this->id);
        if (!empty($team->img) && Storage::disk('public')->exists($team->img)) {
            Storage::disk('public')->delete($team->img);
        }
        $team->delete();
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
        $this->name = '';
        $this->img = '';
        $this->age = '';
        $this->section_id = '';
    }
}
