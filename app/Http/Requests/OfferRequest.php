<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        // unique:offers,name
        return [
             'name'=>'required|max:100',
            'price'=>'required|numeric',
            'details'=>'required'
        ];
    }
    //ازا ما استخدمتا بعالج الاخطاء لوحده غير مهمة
    // دالة موجودة مسبقا
    public function messages()
    {
        return [
            'name.required'=>'you must name required',
           'name.unique'=>'you must name Unique',
           'price.numeric'=>'you must price is numeric ',
           'price.required'=>'you must price is required ',
           'details.required'=>'you must details is required ',
       ];
    }



}
