<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Services\Admin\AdminCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct(protected AdminCategoryService $categoryService)
    {
    }

    public function index()
    {
        $subCategories = $this->categoryService->getListSubCategory(10);
        return view('admin.sub-category.list', compact('subCategories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategory('ascending');
        return view('admin.sub-category.create', compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
        try {

            $this->categoryService->createSubCategory($request->except('_token'));
            return redirect()->route('sub-category.index')->with('swalSuccess', 'Data has been added');
        } catch (\Exception $err) {

            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }

    public function edit($id)
    {
        $categories = $this->categoryService->getAllCategory('ascending');
        $subCategory = $this->categoryService->getOneSubCategoryById($id);
        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }

    public function update($id, SubCategoryRequest $request)
    {
        try {

            $this->categoryService->updateSubCategory($id, $request->except('_token'));
            return redirect()->route('sub-category.index')->with('swalSuccess', 'Data has been updated');
        } catch (\Exception $err) {

            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try{

            $this->categoryService->deleteSubCategory($id);
            return redirect()->back()->with('swalSuccess', 'Successfully deleted category');
        }catch(\Exception $err){
            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }
}
