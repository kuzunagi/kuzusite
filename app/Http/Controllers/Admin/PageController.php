<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StoreRequest as PageStore;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\LogController;

class PageController extends Controller
{
    public function create()
    {
        $data = [
            'pages' => Page::all()
        ];
        return view('page', $data);
    }

    public function edit($id)
    {
        $data = [
            'page' => Page::find($id)
        ];
        return view('pageEdit', $data);
    }

    public function store(PageStore $request)
    {
        $store = $request->store();
        if ($store) {
            $data = [
                $store,
                'message' => 'User insert data'
            ];
            $log = new LogController;

            $log->store('success full', $data);
        }

        return redirect()->route('admin.page-list')->withSuccess('Creating data success');
    }

    public function update()
    {
        # code...
    }

    public function softDestroy()
    {
        # code...
    }

    public function destroy()
    {
        # code...
    }
}
