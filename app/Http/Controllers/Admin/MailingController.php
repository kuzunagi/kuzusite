<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MailingTemplate;
use App\Http\Requests\MailingTemplate\StoreRequest;
use App\Http\Requests\MailingTemplate\UpdateRequest;

class MailingController extends Controller
{
    protected $controllerName;
    public function __construct()
    {
        $this->controllerName = 'mailing-template';
    }

    public function create()
    {
        $this->logController($this->controllerName, 'view', 'success');
        return view();
    }

    public function store(StoreRequest $request)
    {
        $mail = MailingTemplate::create($request->store());
        $mail->refresh();

        $data = [
                'name' => $mail->name,
                'title' => $mail->title,
                'body' => $mail->body,
                'is_active' => $mail->is_active,
                'created_by' => $mail->created_by
            ];
        if ($mail) {
            $this->logController($this->controllerName, 'store', 'Success', $data);
        }

        if ($mail->is_active === true) {
            $active = 'Aktif';
        }else{
            $active = 'Tidak Aktif';
        }
        return redirect()->route('mail-list')->withSuccess('You added ' . $mail->name . ' into database, with active status ' . $active);
    }

    public function update(UpdateRequest $request, $id)
    {
        $mail = MailingTemplate::find($id);

        $mail->name = $request->only('name');
        $mail->title = $request->only('title');
        $mail->body = $request->only('body');
        $mail->is_active = $request->only('isActive');
        $mail->save();

        $change = collect();
        ($mail->wasChanged('name')) ? $change->push('name') : null;
        ($mail->wasChanged('title')) ? $change->push('title') : null;
        ($mail->wasChanged('body')) ? $change->push('body') : null;
        ($mail->wasChanged('is_active')) ? $change->push('is_active') : null;

        $data = [
            'action' => 'Update ' . $change->implode(', '),
            'data' => [
                'before' => $mail->getOriginal(),
                'after' => $mail
            ]
        ];

        $this->logController($this->controllerName, 'update', 'success', $data);

        return redirect()->route('mail-template-list')->withSuccess('Data has been update');
    }

    public function softDelete($id)
    {
        $mail = MailingTemplate::find($id);

        $data = [
            'action' => 'Delete ' . $mail->name,
            'data' => $mail
        ];

        $mail->trashed();

        $this->logController($this->controllerName, 'update', 'success', $data);

        return back()->withSuccess('Data has been delete');
    }


}
