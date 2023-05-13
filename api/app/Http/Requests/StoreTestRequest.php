<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'lecturerId' => ['required', 'digits:9,9'],
            'moduleId' => ['required'],
            'date' => ['required'],
            'time' => ['required', Rule::in(array('08:00', '09:30', '11:00', '12:30', '14:00', '15:30'))],
            'type' => ['required', Rule::in(array('web', 'semester', 'class'))],
            'venue' => ['required', Rule::in(array('10-120', 'Ruth First Hall', '14-1106', '10-140'))],
        ];
    }
}
