<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporateUserRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'primary_email' => 'required|string|email|max:255',
            'mobile' => 'required|string|max:255',
            'postal_addr' => 'required|string|max:255',
            'res_addr' => 'required|string|max:255',
            // 'cc_secondary_email' => 'required|string|email|max:255',
            // 'password' => 'required|string|min:8 |alpha_num',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'primary_email.required' => 'Email is required!',
            'mobile.required' => 'Mobile number is required!',
            'company_name.required' => 'Company Name is required and must be a string!',
            'postal_addr.required' => 'Postal Address is required and must be a string!',
            'res_addr.required' => 'Residential Address is required and must be a string!',
            
            // 'password.required' => 'Password must be at least 8 character long and alpha-numeric  required!'
        ];
    }
}
