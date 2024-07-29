<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\BrandInterface;
use App\Models\Brand;

class BrandRepository implements BrandInterface
{
    public function __construct(protected Brand $model)
    {
    }

    public function getAll()
    {
    }

    public function getPaginate(int $number)
    {
        return $this->model->latest()
            ->filter(request(['keyword']))
            ->paginate($number)
            ->withQueryString();
    }

    public function getAscByName()
    {
        return $this->model->orderBy('name', 'ASC')->get();
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
        return $this->model->find($id)->delete();
    }
}
