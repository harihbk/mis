<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTypeRequest extends FormRequest
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
            'mobileno' => ['required', 'numeric', 'min:11','unique:users,mobileno,'.request()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.request()->id],
            'password' => ['nullable','string', 'min:8'],
        ];
    }
}
