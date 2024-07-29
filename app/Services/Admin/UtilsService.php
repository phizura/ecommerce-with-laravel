<?php


namespace App\Services\Admin;

use App\Interfaces\Admin\CategoryInterface;
use App\Interfaces\Admin\SubCategoryInterface;
use App\Interfaces\Admin\TempImagesInterface;

class UtilsService
{
    public function __construct(
        protected TempImagesInterface $tempImage,
        protected  SubCategoryInterface $subCategory,
        protected  CategoryInterface $category
        )
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

    public function distributeDropdownData($id)
    {
        $category = $this->category->findWithSubCategory($id);
        $subCategory = $category->toArray()[0]['sub_categories'];

        return $subCategory;
    }

}
