<?php

namespace App\Interfaces\Admin;

use App\Interfaces\BaseInterface;

interface SubCategoryInterface extends BaseInterface
{
    public function getPaginate(int $value);
}