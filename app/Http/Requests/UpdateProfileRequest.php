<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => 'required_with:current_password|email',
            'name' => 'required',
            'password' => 'nullable|string',
            'current_password' => 'required|required_with:password'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('you need to fill in a name.'),
            'email.required' => __('you need to fill in an email.'),
            'current_password.required' => __('you need to fill in your current password for this action'),
        ];
    }
}
