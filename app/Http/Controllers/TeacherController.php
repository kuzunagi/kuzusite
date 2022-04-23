<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function create()
    {
        $data = [
            'class' => User::find(Auth::id())->classrooms()->get()
        ];

        return view('teacher-view', $data);
    }

    public function store()
    {
        redirect()->route('classroom-list');
    }
}
