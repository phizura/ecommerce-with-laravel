<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\TempImagesService;
use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    public function __construct(private TempImagesService $tempImagesService)
    {
    }

    public function create(Request $request)
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

}
