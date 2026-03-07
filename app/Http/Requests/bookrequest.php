<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookrequest extends FormRequest
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
            'title'=>'required|string|max:60|min:10',
            'isbn'=>'nullable|string',
            'description'=>'string|nullable',
            'author_id'=>'required|exists:authoore,id',
            'genra'=>'string|nullable',
            'avalible_copies'=>'required|integer',
            'tottle_copies'=>'required|integer',
            'published_at'=>'date|required',
            'cover_imges'=>'string|required'
        ];
    }
}
