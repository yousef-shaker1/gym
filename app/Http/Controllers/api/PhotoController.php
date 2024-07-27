<?php

namespace App\Http\Controllers\api;

use id;
use App\Models\photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotoResponce;
use Nette\Schema\ValidationException;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $imgs = PhotoResponce::collection(photo::all());
        return $this->apiResponse($imgs,'ok', 200);
    }

    public function show(Request $request, $id){
        $img = photo::find($id);
        if(!$img){
            return $this->apiResponse(null, 'image not found', 404);
        }
        return $this->apiResponse(new PhotoResponce($img),'ok', 200);
    }

    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'img' => 'required',
        ]);

    } catch (ValidationException $e) {
        return $this->apiResponse(null, $e->errors(), 400);
    }

    try {
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                // Save the image to storage/app/public/team
                $path = $image->storeAs('public/client', $imageName);
                $validated['img'] = 'client/' . $imageName; // Path to store in the database
            }
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
        }

        try {
            $photo = photo::create($validated);
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'photo creation failed', 500);
        }
    return $this->apiResponse(new PhotoResponce($photo), 'Image created successfully', 201);
}

    public function update(Request $request, $id){
        try{
            $validated = $request->validate([
                'img' => 'required',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $img = photo::find($id);
        if(!$img){
            return $this->apiResponse(null, 'image not found', 404);
        }
        // Handle the image upload and deletion of old image
        if ($request->hasFile('img')) {
            try {
                // Delete old image if it exists
                if ($img->img) {
                    Storage::delete('public/client/' . basename($img->img));
                }

                // Store the new image
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/client', $imageName);
                $validated['img'] = 'client/' . $imageName;
            } catch (\Exception $e) {
                return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
            }
        }

        $img->update($validated);
        return $this->apiResponse(new PhotoResponce($img), 'image updated success', 201);
    }

    public function delete($id){
        $img = photo::find($id);
        if(!$img){
            return $this->apiResponse(null, 'image not found', 404);
        }
        if ($img->img) {
            // Extract the file name from the path
            $imagePath = parse_url($img->img, PHP_URL_PATH);
            $imageName = basename($imagePath);
            
            // Delete the image file from storage
            Storage::delete('public/client/' . $imageName);
        }
    
        $img->delete();
        return $this->apiResponse(null, 'image delete success', 200);
    }
}
