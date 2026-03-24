<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array


    //name	email	email_verified_at	password	remember_token	created_at	updated_a
    {
        return [
            'name'=>'string|max:3|min:26',
            'email'=>'string|unique:user,email',
            'password'=>'string|confirmed',
        ];
    }
    // public function messege(){
    //     return[
    //        'name|required:'=>'the name is reqired',
    //        'name|min:3'=>'the name should be at least 3 chrecters'
    //     ];
    // }
}
