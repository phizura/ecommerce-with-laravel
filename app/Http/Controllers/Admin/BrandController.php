<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\Admin\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(protected BrandService $brandService)
    {
    }

    public function index()
    {
        $brands = $this->brandService->getListBrand(10);
        // dd($brands);
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(BrandRequest $data)
    {
        try {

            $this->brandService->createBrand($data->except('_token'));
            return redirect()->route('brand.index')->with('swalSuccess', 'Data has been added');
        } catch (\Exception $err) {
            //throw $th;
            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }

    public function edit($id)
    {
        $brand = $this->brandService->getOneBrandById($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update($id, BrandRequest $data)
    {
        try {

            $this->brandService->updateBrand($id, $data->except('_token'));
            return redirect()->route('brand.index')->with('swalSuccess', 'Data has been updated');
        } catch (\Exception $err) {
            //throw $th;
            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $this->brandService->deleteBrand($id);
            return redirect()->back()->with('swalSuccess', 'Data has been updated');
        } catch (\Exception $err) {
            //throw $th;
            return redirect()->back()->with('swalError', $err->getMessage());
        }
    }
}
