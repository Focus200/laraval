<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/search', [StudentController::class, 'searchForm'])->name('student.searchForm');
Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');

Route::get('/student/find', [StudentController::class, 'showFindForm'])->name('student.find');

// Ensure edit is a GET route for form display
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Update student via POST or PATCH/PUT
Route::post('/students/{student}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/student/find', [StudentController::class, 'showFindForm'])->name('student.find');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/student/find', [StudentController::class, 'searchForm'])->name('student.find');
Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');

// ... (keep other existing routes)


// Remove the duplicate routes
// Route::get('students/{id}/delete', [StudentController::class, 'delete'])->name('students.delete');

// Use only resource or manual routes, not both
// Route::resource('students', StudentController::class);

