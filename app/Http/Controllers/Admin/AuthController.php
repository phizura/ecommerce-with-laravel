<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\Admin\AdminAuthService;

class AuthController extends Controller
{

    public function __construct(private AdminAuthService $adminAuthService)
    {
    }

    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(AuthRequest $request)
    {

        $credentials = $request->only('email', 'password');
        $res = $this->adminAuthService->attemptLogin($credentials);
        if ($res) {
            if ($res->role === 2) {

                return redirect()->intended(route('admin.dashboard'))->with('success', 'Admin telah tiba!!');
            } else {

                $this->adminAuthService->logout();
                return redirect()->back()->withInput($request->only('email'))->with('error', 'Kamu tidak memiliki akses admin');
            }
        } else {

            return redirect()->back()->withInput($request->only('email'))->with('error', 'Password atau email salah');
        }

    }

    public function logout()
    {
        $this->adminAuthService->logout();
        return redirect()->route('admin.login');
    }
}
