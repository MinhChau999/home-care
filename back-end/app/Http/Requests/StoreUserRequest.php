<?php

namespace App\Http\Requests;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'role' => ['required', new Enum(UserRoleEnum::class)],
            "name" => "nullable|string",
            "phone"=> "nullable|string",
            "address"=> "nullable|string",
            "gender"=> "nullable|boolean",
            "birthday"=> "nullable|date",
            "avatar" => "nullable|file|max:1024|dimensions:min_width=100,min_height=100",
        ];
    }
}
