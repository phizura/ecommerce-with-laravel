<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Services\Admin\UtilsService;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function __construct(private UtilsService $tempImagesService)
    {
    }

    public function createTempImages(Request $request)
    {
        if ($request->file("image")) {
            $res = $this->tempImagesService->createTempImage($request);
            return response()->json([
                'status' => true,
                'image_id' => $res->id,
                'message' => 'Image uploaded successfully'
            ]);
        }
    }

    public function createSlug(Request $request) {
        $slug = '';
        if (!empty($request->title)) {
            $slug = Str::slug($request->title);
        };
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    }
}
