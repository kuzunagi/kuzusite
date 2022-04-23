<?php

namespace App\Http\Requests\Classroom;

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
            'teacherId' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['required'],
            'openSchedule' => ['date'],
            'closeSchedule' => ['date'],
        ];
    }

    public function store()
    {
        [
          'teacher_id' => $this->only('teacherId'),
          'name' => $this->only('name'),
          'description' => $this->only('description'),
          'status' => $this->only('status'),
          'open_schedule' => $this->only('openSchedule'),
          'close_schedule' => $this->only('closeSchedule'),
        ];
    }
}
