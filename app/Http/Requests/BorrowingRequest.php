<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BorrowingRequest extends FormRequest
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
            'book_id'=>'required|exists:barrowings,book_id',
            'member_id'=>'required|exists:barrowings,member_id',
            'borrowed_at'=>'required:date',
            'returned_at'=>'required:date|after:dated_at',

                   ];

    }
}
