<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAccountRequest extends FormRequest
{

    public $types = array(
        'admin',
        'lecturer',
        'student'
    );

    public $statuses = array(
        'active',
        'pending',
        'inactive'
    );

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
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'password' => ['required', 'min:8'],
            'type' => ['required', Rule::in($this->types)],
            'userId' => ['required_if:type,student,lecturer', 'numeric'],
            'courseId' => ['required_if:type,lecturer,student']
        ];
    }
}