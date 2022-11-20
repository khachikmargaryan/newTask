<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLocationRequest extends FormRequest
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
        return [
            "ip" => "required",
            "coord_x" => "required",
            "coord_y" => "required",
        ];
    }

}
