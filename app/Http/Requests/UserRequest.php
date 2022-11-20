<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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

    public function rules()
    {
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            "name"     => "required",
            "email"    => "required|unique:users",
            "password" => "required|min:6",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            "name"     => "required",
            'email'    => [
                'required',
                Rule::unique('users')->ignore($this->user->id),
            ],
            "password" => "nullable|sometimes|min:6",
        ];
    }
}
