<?php

namespace App\Http\Controllers\api;

use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResponce;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\api\ApirequestTrait;
use League\Config\Exception\ValidationException;

class sectionController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $sections = SectionResponce::collection(Section::all());
        return $this->apiResponse($sections,'ok', 200);
    }

    public function show(Request $request, $id){
        $section = Section::find($id);
        if(!$section){
            return $this->apiResponse(null, 'section not found', 404);
        }
        return $this->apiResponse(new sectionResponce($section),'ok', 200);
    }

    public function store(Request $request){
        try{
            $validated = $request->validate([
                'img' => 'required',
                'name' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }

        try {
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                // Save the image to storage/app/public/team
                $path = $image->storeAs('public/section', $imageName);
                $validated['img'] = 'section/' . $imageName; // Path to store in the database
            }
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
        }

        try {
            $section = Section::create($validated);
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'section creation failed', 500);
        }
        return $this->apiResponse(new sectionResponce($section), 'section create success', 201);
    }

    public function update(Request $request, $id){
        try{
            $validated = $request->validate([
                'img' => 'nullable',
                'name' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $section = Section::find($id);
        if(!$section){
            return $this->apiResponse(null, 'section not found', 404);
        }

        if ($request->hasFile('img')) {
            try {
                // Delete old image if it exists
                if ($section->img) {
                    Storage::delete('public/section/' . basename($section->img));
                }

                // Store the new image
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/section', $imageName);
                $validated['img'] = 'section/' . $imageName;
            } catch (\Exception $e) {
                return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
            }
        }

        $section->update($validated);
        return $this->apiResponse(new sectionResponce($section), 'section updated success', 201);
    }

    public function delete($id){
        $section = Section::find($id);
        if(!$section){
            return $this->apiResponse(null, 'section not found', 404);
        }

        // Delete the associated image if it exists
        if ($section->img) {
            // Extract the file name from the path
            $imagePath = parse_url($section->img, PHP_URL_PATH);
            $imageName = basename($imagePath);
            
            // Delete the image file from storage
            Storage::delete('public/section/' . $imageName);
        }
        $section->delete();
        return $this->apiResponse(null, 'section delete success', 404);
    }
}
