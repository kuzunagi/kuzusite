<?php

namespace App\Http\Requests\Page;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

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
            'name' => 'required',
        ];
    }

    public function store()
    {

        if (! Page::where('name', $this->only('name'))->firstOrFail()) {
            back()->withErrors('Name page already in database');
        }

        return Page::create([
            'name' => $this->only('name'),
            'is_admin' => $this->only('isAdmin')
        ]);
    }
}
