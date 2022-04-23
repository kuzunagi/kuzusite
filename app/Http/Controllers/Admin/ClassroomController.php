<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Classroom\StoreRequest;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    protected $controllerName;
    public function __construct()
    {
        $this->controllerName = 'classroom';
    }
    public function create()
    {
        return view();
    }

    public function store(StoreRequest $request)
    {
        $classroom = Classroom::create($request->store());

        $this->logController($this->controllerName, 'store', 'Success', $classroom);
    }
}
