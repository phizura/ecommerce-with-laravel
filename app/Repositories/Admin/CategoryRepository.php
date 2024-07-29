<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function __construct(private Category $model)
    {
    }

    public function getAll()
    {
        return $this->model->latest()->filter(request(['keyword']))->get();
    }

    public function getPaginate(int $value)
    {
        return $this->model->latest()
            ->filter(request(['keyword']))
            ->paginate($value)
            ->withQueryString();
    }

    public function getAscByName()
    {
        return $this->model->orderBy('name', 'ASC')->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findWithSubCategory($id)
    {
        return $this->model->with('subCategories:category_id,id,name')->find($id);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
