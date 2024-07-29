<?php

namespace App\Interfaces\Admin;

interface AdminAuthInterface
{
    public function findByEmail($email);
}

