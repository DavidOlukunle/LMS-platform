<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function instructor(){
        $instructors = User::role('instructor')->get();
        return view('admin.instructor.index', compact('instructors'));
    }
}
