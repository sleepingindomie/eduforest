<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

// Redirect ke halaman login saat pertama kali diakses
Route::get('/', function () {
    return redirect('/login');
});

// Rute autentikasi
Auth::routes();

// Middleware untuk autentikasi
Route::middleware(['auth'])->group(function () {

    // Log user yang telah terautentikasi
    Log::info('User has been authenticated', ['user_id' => Auth::id()]);

    // Rute untuk semua pengguna yang terautentikasi
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rute untuk mengelola pengguna
    Route::resource('users', UserController::class)->except(['create', 'show']);

    // Rute untuk mengelola kursus
    Route::resource('courses', CourseController::class);

    // Rute untuk mengelola Subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');  
    Route::resource('subjects', SubjectController::class);

    // Rute tambahan sesuai dengan role
    Route::get('/dosen/dashboard', [HomeController::class, 'lecturerDashboard'])->name('dosen.dashboard');
    Route::get('/mahasiswa/dashboard', [HomeController::class, 'studentDashboard'])->name('mahasiswa.dashboard');
    
    // Rute untuk profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Rute untuk update password
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change_password');
    
});

// Mengarahkan rute dashboard ke home
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/home');
    })->name('dashboard');
});
