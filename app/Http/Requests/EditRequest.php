<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'profile_picture' => 'image|max:2048',
            'cover_picture' => 'image|max:2048',
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'max:255'
        ];
    }
}
