<?php

namespace App\Http\Requests;

use App\Book;
use Illuminate\Foundation\Http\FormRequest;

class BookCreateOrUpdateRequest extends FormRequest
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
        $coverTypesString = implode(',', Book::COVER_TYPES);
        return [
            'name' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'pages_count' => 'required|numeric',
            'year' => 'required|numeric',
            'publisher_id' => 'required|exists:publishers,id',
            'cover_type' => "required|in:$coverTypesString",
        ];
    }
}
