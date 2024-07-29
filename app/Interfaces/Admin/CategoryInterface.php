<?php

namespace App\Interfaces\Admin;

interface CategoryInterface
{
    public function getAll();
    public function getPaginate(int $value);
    public function getAscByName();
    public function find($id);
    public function findWithSubCategory($id);
    public function create(array $data);
    public function update($id, $data);
    public function delete($id);
}
