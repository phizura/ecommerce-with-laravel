<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $id = $this->route('brand');
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|max:255',
                'slug' => 'required|unique:brands|max:255',
                'is_active' => 'required|nullable|in:0,1'
            ];
        } else if ($this->isMethod('put')) {
            return [
                'name' => 'required|max:255',
                'slug' => 'required|max:255|unique:brands,slug,' . $id .',id',
                'is_active' => 'required|nullable|in:0,1'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Field tidak boleh kosong',
            'name.max' => 'Data melebihi batas maximal karakter',
            'slug.required' => 'Field tidak boleh kosong',
            'slug.unique' => 'Slug sudah dipakai',
            'slug.max' => 'Data melebihi batas maximal karakter',
            'is_active.required' => 'Field tidak boleh kosong',
            'is_active.in' => 'Status berada diluar jangkauan'
        ];
    }

}
