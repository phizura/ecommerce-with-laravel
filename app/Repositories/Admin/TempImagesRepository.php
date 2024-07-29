<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\TempImagesInterface;
use App\Models\TempImage;

class TempImagesRepository implements TempImagesInterface
{
    public function __construct(private TempImage $model)
    {
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
