<?php

namespace App\Http\Requests\MailingTemplate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'title' => ['required', 'string'],
            'body' => ['required'],
            'isActive' => ['boolean']
        ];
    }

    public function store()
    {
        [
            'name' => $this->only('name'),
            'title' => $this->only('title'),
            'body' => $this->only('body'),
            'is_active' => $this->only('isActive'),
            'created_by' => Auth::id()
        ];
    }
}
