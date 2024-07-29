<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\Admin\AdminCategoryService;
use App\Services\Admin\UtilsService;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function __construct(
        protected UtilsService $utilsService,
        protected AdminCategoryService $categoryService
    ) {
    }

    public function createTempImages(Request $request)
    {
        if ($request->file("image")) {
            $res = $this->utilsService->createTempImage($request);
            return response()->json([
                'status' => true,
                'image_id' => $res->id,
                'message' => 'Image uploaded successfully'
            ]);
        }
    }

    public function createSlug(Request $request)
    {
        $slug = '';
        if (!empty($request->title)) {
            $slug = Str::slug($request->title);
        };
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    }

    public function getDropDown(Request $request)
    {
        try {
            $result = $this->utilsService->distributeDropdownData($request->all());
            return response()->json([
                'status' => 200,
                'massage' => 'Success getting data',
                'data' => $result
            ]);
        } catch (\Throwable $err) {
            return response()->json([
                'status' => 500,
                'massage' => 'Failed getting data',
                'error' => $err->getMessage()
            ]);
        }
    }
}
