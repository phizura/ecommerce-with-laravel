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

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->model->find($id)->update($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }
}
