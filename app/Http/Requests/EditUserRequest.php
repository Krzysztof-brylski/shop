<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'city'=>'required|string|max:255',
            'zip_code'=>'required|between:6,6',
            'street'=>'required|string|max:255',
            'street_no'=>'required|string|min:0|max:5',
            'home_no'=>'required|string|min:0|max:5',

        ];
    }
}
