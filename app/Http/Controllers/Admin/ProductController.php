<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\Admin\AdminCategoryService;
use App\Services\Admin\BrandService;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected AdminCategoryService $categoryService,
        protected BrandService $brandService
    ) {
    }

    public function index()
    {
        return view('admin.products.list');
    }

    public function create()
    {

        $categories = $this->categoryService->getAllCategory('ascending');
        $brands = $this->brandService->getAllBrands();
        return view('admin.products.create', compact('categories','brands'));
    }

    public function store(ProductRequest $request)
    {
        return $request;
    }

    public function edit($id)
    {
    }

    public function update($id, ProductRequest $data)
    {
    }

    public function destroy($id)
    {
    }
}
