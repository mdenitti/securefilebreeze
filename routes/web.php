<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Models\File;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    if(Auth::check()) {
        $user = Auth::user()->id;
        $files = File::where('user_id', $user)->get();
        return view('dashboard', compact('files'));
    }
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/your-upload-route', [FileUploadController::class, 'store']);
});


 


require __DIR__.'/auth.php';
