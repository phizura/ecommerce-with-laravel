<?php


namespace App\Services\Admin;

use App\Interfaces\Admin\AdminAuthInterface;
use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    public function __construct(private AdminAuthInterface $user)
    {
    }

    public function attemptLogin(array $credentials)
    {
        $email = $credentials["email"];
        $password = $credentials["password"];

        $admin = $this->user->findByEmail($email);

        if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]))
        {
            return $admin;
        }
        return null;
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        
    }
}
