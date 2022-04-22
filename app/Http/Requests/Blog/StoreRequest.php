<?php

namespace App\Http\Requests\Blog;

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
            'title' => 'required',
            'body' => 'required',
            'publish' => 'required'
        ];
    }

    public function data()
    {
        return [
            'user_id' => Auth::id(),
            'title' => $this->only('title'),
            'body' => $this->only('body'),
            'publish' => $this->only('publish'),
        ];
    }

}
