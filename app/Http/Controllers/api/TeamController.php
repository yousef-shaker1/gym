<?php

namespace App\Http\Controllers\api;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResponce;
use Illuminate\Support\Facades\Storage;
use League\Config\Exception\ValidationException;

class TeamController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $teams = TeamResponce::collection(Team::all());
        return $this->apiResponse($teams,'ok', 200);
    }

    public function show($id){
        $team = Team::find($id);
        if(!$team){
            return $this->apiResponse(null, 'team not found', 404);
        }
        return $this->apiResponse(new TeamResponce($team),'ok', 200);
    }

    
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'img' => 'required|image',
                'name' => 'required|string',
                'age' => 'required|numeric',
                'section_id' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }

        // Handle the image upload
        try {
            if ($request->hasFile('img')) {
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                // Save the image to storage/app/public/team
                $path = $image->storeAs('public/team', $imageName);
                $validated['img'] = 'team/' . $imageName; // Path to store in the database
            }
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
        }

        try {
            $team = Team::create($validated);
        } catch (\Exception $e) {
            return $this->apiResponse(null, 'Team creation failed', 500);
        }

        return $this->apiResponse(new TeamResponce($team), 'Team created successfully', 201);
    }



    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'img' => 'nullable|image',
                'name' => 'nullable|string',
                'age' => 'nullable|numeric',
                'section_id' => 'nullable|numeric',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }

        $team = Team::find($id);
        if (!$team) {
            return $this->apiResponse(null, 'Team not found', 404);
        }

        // Handle the image upload and deletion of old image
        if ($request->hasFile('img')) {
            try {
                // Delete old image if it exists
                if ($team->img) {
                    Storage::delete('public/team/' . basename($team->img));
                }

                // Store the new image
                $image = $request->file('img');
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/team', $imageName);
                $validated['img'] = 'team/' . $imageName;
            } catch (\Exception $e) {
                return $this->apiResponse(null, 'Image upload failed: ' . $e->getMessage(), 500);
            }
        }

        // Update the team record with new values
        $team->update($validated);

        return $this->apiResponse(new TeamResponce($team), 'Team updated successfully', 200);
    }

    public function delete($id)
{
    $team = Team::find($id);
    if (!$team) {
        return $this->apiResponse(null, 'Team not found', 404);
    }

    // Delete the associated image if it exists
    if ($team->img) {
        // Extract the file name from the path
        $imagePath = parse_url($team->img, PHP_URL_PATH);
        $imageName = basename($imagePath);
        
        // Delete the image file from storage
        Storage::delete('public/team/' . $imageName);
    }

    // Delete the team record
    $team->delete();

    return $this->apiResponse(null, 'Team deleted successfully', 200);
}
}
