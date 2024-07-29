<?php

namespace App\Interfaces\Admin;

use App\Interfaces\BaseInterface;

interface ProductInterface extends BaseInterface
{

    public function getPaginate(int $value);
}
