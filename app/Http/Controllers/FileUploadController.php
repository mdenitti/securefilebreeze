<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the uploaded file (more on this later)
        $request->validate([
            'my_file' => 'required|file|max:2048', // Example: max 2MB file
            'name' => 'required',
        ]);

        // Store the file
        $path = $request->file('my_file')->store('uploads', 'public'); // Store in 'storage/app/uploads' 
        $userid = Auth::user()->id;
        // Store the file details in the database old school
       /*  $file = new File();
        $file->name = $request->name;
        $file->path = $path;
        $file->user_id = $userid;
        $file->save(); */ 

        // Eloquent way
        File::create([
            'name' => $request->name,
            'path' => $path,
            'user_id' => $userid
        ]);

        // Optional: Store file details in the database
        // ...
       
        return redirect()->back()->with('success', 'File uploaded successfully!'); 
    }
}
