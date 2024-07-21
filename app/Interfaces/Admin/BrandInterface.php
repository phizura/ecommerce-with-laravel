<?php

namespace App\Interfaces\Admin;

use App\Interfaces\BaseInterface;

interface BrandInterface extends BaseInterface
{
    public function getPaginate(int $number);
}
