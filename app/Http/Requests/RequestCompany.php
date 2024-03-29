<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCompany extends FormRequest
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
            'name' => 'required|max:35',
            'email' => 'required|unique:companies,id' . $this->id,
            'address' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Company Name is required'
        ];
    }
}
