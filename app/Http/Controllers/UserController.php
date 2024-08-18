<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    //list of users all
    public function index(){
        //
        $users = User::All();
        return response()->json(['data' => UserResource::collection($users), "status" => true], 200);
    }

    // Add a new user
    public function create(UserRequest $request)
    {
        try{
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'image' => 'sometimes|required|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            ]);
        
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors(), "status" => false], 422);
            }
        
            // Handle image upload
            $fileName = null;
            if ($request->hasFile('image')) {
                $fileName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->storeAs('public/images', $fileName);
            }
        
            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'image' => $fileName ?? '',
                'token' => bcrypt($request->email.time()),  // This can be removed if you are using Laravel Sanctum for API tokens
            ]);
        
            // Generate an API token
            $token = $user->createToken('authToken')->plainTextToken;
        
            return response()->json([
                'data' => new UserResource($user),
                "status" => true
            ], 200);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage(), "status" => false], 500);
        }
    }

    // Get user id
    public function show(string|int $id){
        try{
            //
            $user = User::find($id);
            if($user){
                return response()->json(['data' => new UserResource($user), "status" => true], 200);
            }
            else{
                return response()->json(['error' => "User not found", "status" => false], 404);
            }
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage(), "status" => false], 500);
        }
    }

    // Update user profile
    public function update(UserRequest $request, string|int $id)
    {
        //
    }
    // Delete user
    public function delete(UserRequest $request, string|int $id)
    {
        try{
            //
            $user = User::find($id);
            if($user){
                // Delete the user's image if it exists
                if ($user->image && Storage::exists('public/images/' . $user->image)) {
                    Storage::delete('public/images/' . $user->image);
                }

                // Delete the user
                $user->delete();
                return response()->json(['message' => "User deleted successfully", "status" => true], 200);
            }
            else{
                return response()->json(['error' => "User not found", "status" => false], 404);
            }
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage(), "status" => false], 500);
        }
    }
}
