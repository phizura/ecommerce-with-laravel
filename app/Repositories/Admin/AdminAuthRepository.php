<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\AdminAuthInterface;
use App\Models\User;

class AdminAuthRepository implements AdminAuthInterface
{
    public function __construct(private User $model)
    {
    }
    public function findByEmail($email)
    {
        return $this->model->where("email", $email)->first();
    }
}
