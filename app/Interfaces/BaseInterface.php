<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function getAll();
    public function getOne($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
