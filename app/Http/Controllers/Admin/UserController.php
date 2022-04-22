<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    protected $logType;
    public function __construct()
    {
        $this->logType = 'User';
    }

    public function create()
    {
        $data['users'] = User::all();
        return view();
    }

    public function store(StoreRequest $request)
    {
        $pass = $request->password();
        $user = User::create([
            'name' => $request->only('name'),
            'username' => $request->username(),
            'email' => $request->only('email'),
            'password' => Hash::make($pass)
        ]);

        // credentials send by email
    }

    public function update(UpdateRequest $request)
    {
        $user = User::find($request->only('id'));
        $user->name = $request->only('name');
        $user->role_id = $request->only('role_id');
        $user->username = $request->only('username');
        $user->email = $request->only('email');
        if ($request->only('password')) {
            $user->password = $request->password();
        }

        $data = [
            'before' => [
                'name' => $user->getOriginal('name'),
                'role_id' => $user->getOriginal('role_id'),
                'username' => $user->getOriginal('username'),
                'email' => $user->getOriginal('email'),
            ],
            'after' => [
                'name' => $user->name,
                'role_id' => $user->role_id,
                'username' => $user->username,
                'email' => $user->email,
            ]
        ];

        $this->logController->store($this->logType, Auth::id(), $data);

    }
}
