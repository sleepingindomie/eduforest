<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('home', ['user' => $user, 'role' => $user->role]);
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function manageCourses()
    {
        $courses = Course::all(); // Mengambil semua data kursus
        return view('courses', compact('courses'));
    }
}
