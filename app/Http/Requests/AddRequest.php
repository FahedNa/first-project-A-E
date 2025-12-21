<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'Property_Title'=>'required',
            'Description'=>'required',
            'Price'=>'required|numeric',
            'Property_Type'=>'required',
            'Street_Address'=>'required',
            'phone_num'=>'required',
            'floor'=>'required|numeric',
            'Bedrooms'=>'required|numeric',
            'Bathrooms'=>'required|numeric',
            'Square_Feet'=>'required|numeric',
            'Status'=>'required',

        ];
    }
}
