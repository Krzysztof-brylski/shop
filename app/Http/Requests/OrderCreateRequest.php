<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'name'=>'string|required|max:50',
            'surname'=>'string|required|max:50',
            'email'=>'email|required|string|max:50',
            'phoneNo'=>'string|required|max:9|min:9',
            'zipCode'=>'string|required|max:6|min:6',
            'address'=>'string|required|max:150',
            'country'=>'string|required|max:50',
            'city'=>'string|required|max:100',
        ];
    }
}
