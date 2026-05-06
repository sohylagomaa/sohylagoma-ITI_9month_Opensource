<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
        return [
            'title'   => 'required|string|min:5|max:255',
            'content' => 'required|string',
        ];
    }

    // Otherwise, we are updating (PUT/PATCH)
    return [
        'title'   => 'nullable|string|min:5|max:255',
        'content' => 'nullable|string',
    ];
    }

    
}
