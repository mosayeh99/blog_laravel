<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpadteUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('users','name')->ignore($this->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')->ignore($this->id)
            ],
            'password' => 'required'|'min:8'
        ];
    }
}
