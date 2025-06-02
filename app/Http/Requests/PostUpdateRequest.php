<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:8', 'max:255', Rule::unique('posts', 'title')->ignore($this->route('post')->id)],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'file', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'author_id' => ['required','exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
