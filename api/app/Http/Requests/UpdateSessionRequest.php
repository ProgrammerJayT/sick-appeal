<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSessionRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                //
                'lecturerId' => ['required'],
                'moduleId' => ['required'],
                'date' => ['required'],
                'time' => ['required'],
                'status' => ['required'],
            ];
        } else {
            return [
                //
                'lecturerId' => ['sometimes', 'required'],
                'moduleId' => ['sometimes', 'required'],
                'date' => ['sometimes', 'required'],
                'time' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }
}
