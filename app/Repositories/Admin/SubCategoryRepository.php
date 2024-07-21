<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\SubCategoryInterface;
use App\Models\SubCategory;

class SubCategoryRepository implements SubCategoryInterface
{
    public function __construct(protected SubCategory $model)
    {
    }

    public function getAll()
    {

    }

    public function getPaginate(int $value)
    {
        return $this->model->latest()
            ->filter(request(['keyword']))
            ->paginate($value)
            ->withQueryString();
    }

    public function getOne($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }
}
