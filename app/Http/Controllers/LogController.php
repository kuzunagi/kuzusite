<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\LogType;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function get()
    {
        return Log::all();
    }

    public function store($type, $data)
    {
        $value = LogType::select('id')->where('name', $type)->first();
        Log::create([
            'user_id' => Auth::id(),
            'type' => $value,
            'data' => $data
        ]);
    }
}
