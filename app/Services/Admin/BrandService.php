<?php


namespace App\Services\Admin;

use App\Interfaces\Admin\BrandInterface;

class BrandService
{
    public function __construct(private BrandInterface $brand)
    {
    }

    public function getOneBrandById($id)
    {
        return $this->brand->getOne($id);
    }

    public function getListBrand(int $value)
    {
        return $this->brand->getPaginate($value);
    }

    public function createBrand(array $data)
    {
        $this->brand->create($data);
    }

    public function updateBrand($id, array $data)
    {
        $this->brand->update($id, $data);
    }

    public function deleteBrand($id)
    {
        $this->brand->delete($id);
    }
}
