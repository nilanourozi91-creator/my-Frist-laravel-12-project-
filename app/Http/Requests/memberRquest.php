<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class memberRquest extends FormRequest
{
    // name	email	addrass	whatsapp	statues	membership_date
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
            'name'=>'required|max:25|min:3|string',
            'email'=>'required|string',
            'addrass'=>'|max:25|min:10|string',
            'whatsapp'=>'required|max:10|min:10',
            'statues'=>'string',
        ];
    }
}
