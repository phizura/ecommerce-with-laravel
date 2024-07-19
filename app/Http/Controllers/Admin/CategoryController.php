<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Admin\AdminCategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct(private AdminCategoryService $adminCategoryService)
    {
    }

    public function index()
    {
        $categories = $this->adminCategoryService->getListCategory(10);
        return view("admin.category.list", compact("categories"));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request)
    {
        try {

            $this->adminCategoryService->createCategory($request->except('_token'));
            return redirect()->route('categories.index')->with('swalSuccess', 'Category added successfully');
        } catch (\Exception $e) {

            return redirect()->back()->with('swalError', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = $this->adminCategoryService->getOneCategoryById($id);
        if (empty($category)) {
            return redirect()->route('categories.index');
        }
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        try {

            $this->adminCategoryService->updateCategory($id, $request->except('_token', "_method"));
            return redirect()->route('categories.index')->with('swalSuccess', 'Category has been updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('swalError', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
