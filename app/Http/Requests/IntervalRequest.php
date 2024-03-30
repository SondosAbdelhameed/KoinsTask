<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class IntervalRequest extends ApiRequest
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
            'user_id' => ['required', 'numeric', 'exists:users,id'],
            'book_id' => ['required', 'numeric', 'exists:books,id'],
            'start_page' => ['required', 'numeric', 'min:1'],
            'end_page' => ['required', 'numeric', 'gt:start_page', 'max:'. ((Book::find($this->book_id) != '')? Book::find($this->book_id)->page_number : 0)  ] 
        ];
    }
}
