<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $id = $this->route('id');
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:products,slug',
                'description' => 'sometimes|string|max:500',
                'price' => 'required|numeric|min:0',
                'compare_price' => 'sometimes|nullable|numeric|min:0',
                'category_id' => 'required|integer|exists:categories,id',
                'sub_category_id' => 'sometimes|integer|nullable|exists:sub_categories,id',
                'brand_id' => 'sometimes|integer|nullable|exists:brands,id',
                'is_featured' => 'required|in:Yes,No',
                'sku' => 'required|string|max:255',
                'barcode' => 'sometimes|nullable|string',
                'track_qty' => 'required|in:Yes,No',
                'is_active' => 'required|boolean',
            ];
        } else if ($this->isMethod("put")) {
            return [];
        }
    }

    protected function withValidator($validator)
    {
        $validator->sometimes('qty', 'required|integer|min:0', function ($input) {
            return $input->track_qty === 'Yes';
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'Nama masih kosong',
            'title.string' => 'Nama harus berisikan sebuah string',
            'title.max' => 'Nama melebihi batas maksimum',
            'slug.required' => 'Slug masih kosong',
            'slug.string' => 'Slug harus berisikan sebuah string',
            'slug.unique' => 'Slug sudah terpakai',
            'description.string' => 'Deskripsi harus berisikan sebuah string',
            'description.max' => 'Nama melebihi batas maksimum',
            'price.required' => 'Price masih kosong',
            'Price.numeric' => 'Price harus berisi angka',
            'price.min' => 'Price tidak boleh dibawah 0',
            'compare_price.numeric' => 'Compare price harus berisi angka',
            'compare_price.min' => 'Compare price tidak boleh dibawah 0',
            'category_id.required' => 'Category masih kosong',
            'category_id.integer' => 'Gagal memasukkan category',
            'category_id.exists' => 'Gagal memasukkan category',
            'sub_category_id.integer' => 'Gagal memasukkan sub category',
            'sub_category_id.exists' => 'Gagal memasukkan sub category',
            'brand_id.integer' => 'Gagal memasukkan brand',
            'brand_id.exists' => 'Gagal memasukkan sub brand',
            'is_featured.required' => 'Featured masih kosong',
            'is_featured.exists' => 'Gagal memasukkan Featured',
            'sku.required' => 'Sku masih kosong',
            'sku.string' => 'Sku harus berisikan sebuah string',
            'sku.max' => 'Sku melebihi batas maksimum',
            'barcode.string' => 'Barcode harus berisikan sebuah string',
            'track_qty.required' => 'Track QTY masih kosong',
            'track_qty.in' => 'Gagal memasukkan Track QTY',
            'is_active.boolean' => 'Deskripsi harus berisikan sebuah boolean'
        ];
    }
}
