<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Complaints extends FormRequest
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
            //
            'name'=>'required',
            'age'=>'required',
            'address'=>'required',
            'complainant_address'=>'required',
            'email'=>'required',
            'value'=>'required',
            'issue'=>'required',
            'status'=>'required',
            'image'=>'file|mimes:jpg,png,jpeg,pdf'
        ];
    }
}
