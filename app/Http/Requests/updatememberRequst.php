<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatememberRequst extends FormRequest
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
    // name	email	addrass	whatsapp	statues	membership_date
    public function rules(): array
    {
        return [
            'name'=>'string',
            'email'=>'string',
            'addrass'=>'string|max:10|min:40',
            'whatsapp'=>'string|max:10|min:10'
        ];
    }
}
