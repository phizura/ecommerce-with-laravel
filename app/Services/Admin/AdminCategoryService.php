<?php


namespace App\Services\Admin;

use App\Interfaces\Admin\CategoryInterface;
use App\Interfaces\Admin\SubCategoryInterface;
use App\Interfaces\Admin\TempImagesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
// use Image;
use Intervention\Image\ImageManagerStatic as Image;

class AdminCategoryService
{
    public function __construct(
        protected CategoryInterface $category,
        protected TempImagesInterface $tempImages,
        protected SubCategoryInterface $subCategory
    ) {
    }

    //! Category
    public function getAllCategory($type = null)
    {
        if ($type === 'ascending') {
            return $this->category->getAscByName();
        }

        return $this->category->getAll();
    }

    public function getListCategory(int $value)
    {
        return $this->category->getPaginate($value);
    }

    public function getOneCategoryById($id)
    {
        return $this->category->find($id);
    }

    public function createCategory(array $data)
    {

        DB::transaction(function () use ($data) {

            $newData = collect($data)
                ->except('image_id');
            $category = $this->category->create($newData->all());

            $response = $this->makeImage([
                'image_id' => $data['image_id'],
                'category_id' => $category->id
            ]);
            $this->category->update($category->id, $data = ["image" => $response]);
        });
    }

    public function updateCategory($id, $data)
    {
        $category = $this->getOneCategoryById($id);
        if (empty($category)) {
            abort('500', 'Category not found');
        }

        DB::transaction(function () use ($data, $category) {

            if ($data['type'] === 'updated') {
                $this->makeImage([
                    'old_image_id' => $category->image,
                    'image_id' => $data['image_id'],
                    'category_id' => $category->id
                ], 'update');
            }

            $this->category->update($category->id, $data);
        });
    }

    public function deleteCategory($id)
    {
        $category = $this->getOneCategoryById($id);

        if ($category['image']) {
            if (File::exists(storage_path('/app/public/uploads/category/thumb/' . $category->image))) {
                File::delete(storage_path('/app/public/uploads/category/' . $category->image));
                File::delete(storage_path('/app/public/uploads/category/thumb/' . $category->image));
            } else {
                abort('500', 'File not found.');
            }
        }
        $this->category->delete($id);
    }


    protected function makeImage($data, $type = null)
    {

        if ($data['image_id']) {
            if ($type == 'update') {
                dd('masuk');
                if (File::exists(storage_path('/app/public/uploads/category/thumb/' . $data['old_image_id']))) {
                    File::delete(storage_path('/app/public/uploads/category/' . $data['old_image_id']));
                    File::delete(storage_path('/app/public/uploads/category/thumb/' . $data['old_image_id']));
                } else {
                    abort('500', 'File not found.');
                }
            }

            $tempImage = $this->tempImages->find($data['image_id']);
            $ext = pathinfo($tempImage->name, PATHINFO_EXTENSION);

            $newImageName = $data['category_id'] . '.' . $ext;
            $oldFile = storage_path('/app/public/' . $tempImage->name);
            $newFile = storage_path('/app/public/uploads/category/' . $newImageName);

            if (!File::exists(storage_path('/app/public/uploads/category/thumb'))) {
                File::makeDirectory(storage_path('/app/public/uploads/category/thumb'), 0755, true, true);
            }

            $thumbFile = storage_path('/app/public/uploads/category/thumb/' . $newImageName);
            $img = Image::make($oldFile);
            $img->fit(450, 600, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($thumbFile);

            File::move($oldFile, $newFile);
            $tempImage->delete();
            return $newImageName;
        }
    }

    //! Sub Category

    public function getListSubCategory(int $value)
    {
        return $this->subCategory->getPaginate($value);
    }

    public function createSubCategory($data)
    {
        $this->subCategory->create($data);
    }

    public function getOneSubCategoryById($id)
    {
        return $this->subCategory->getOne($id);
    }

    public function updateSubCategory($id, $data)
    {
        return $this->subCategory->update($id, $data);
    }

    public function deleteSubCategory($id)
    {
        $this->subCategory->delete($id);
    }
}
