<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category');
        if ($this->isMethod('post')) {
            return [
                "name" => "required",
                "slug" => "required|unique:categories",
            ];
        } else if ($this->isMethod("put")) {
            return [
                "name" => "required",
                "slug" => "required|unique:categories,slug,".$id,
            ];
        }
    }

    public function messages(): array
    {
        return [
            "name.required" => "Nama tidak boleh kosong",
            "slug.required" => "Slug tidak boleh kosong",
            "slug.unique" => "Slug sudah diambil",
        ];
    }
}
