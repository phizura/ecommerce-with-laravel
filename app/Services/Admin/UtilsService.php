<?php


namespace App\Services\Admin;

use App\Interfaces\Admin\TempImagesInterface;

class UtilsService
{
    public function __construct(private TempImagesInterface $tempImage)
    {
    }

    public function createTempImage($data)
    {

        $ext = $data->file('image')->getClientOriginalExtension();
        $newName = time() . "." . $ext;
        $storeName = $data->file('image')->storeAs('temp', $newName);

        $tempImage = $this->tempImage->create(['name' => $storeName]);
        return $tempImage;
    }


}
