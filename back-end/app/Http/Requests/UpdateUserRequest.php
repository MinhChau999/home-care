<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "email" => ['required', 'email', Rule::unique('users')->ignore($this->route('user')->id)],
            "name" => "nullable|string|min:6",
            "phone" => "nullable|string",
            "address" => "nullable|string",
            "gender" => "nullable|boolean",
            "birthday" => "nullable|date",
            "avatar" => "nullable|file|max:1024|dimensions:min_width=100,min_height=100",
        ];
    }
}
