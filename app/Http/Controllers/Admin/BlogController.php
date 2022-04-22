<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    protected $logType;
    public function __construct()
    {
        $this->logType = 'Blog';
    }

    public function view()
    {
        $data['blog'] = Blog::all();
        return view('viewblog', $data);
    }

    public function create()
    {
        return view('blog');
    }

    public function store(StoreRequest $request)
    {
        $data = Blog::create([
            'user_id' => Auth::id(),
            'title' => $this->only('title'),
            'body' => $this->only('body'),
            'publish' => $this->only('publish'),
        ]);

        $this->logController->store($this->logType, Auth::id(), $data);

        return redirect()->route('blog')->withSuccess('blog with title ' . $data->title . 'has been create');
    }
}
