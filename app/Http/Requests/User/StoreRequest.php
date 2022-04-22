<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email', 'email:rfc,dns'],
        ];
    }

    public function username()
    {
        Str::slug($this->only('name'));
    }

    public function password()
    {
        Str::random(16);
    }
}
