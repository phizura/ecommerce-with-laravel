<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login', []);
    }

    public function authenticate(AuthRequest $request)
    {
        // if (Auth::guard('admin')->attempt($request->all())) {
        // }

        if (Auth::guard('admin')
            ->attempt(
                ['email' => $request->email, 'password' => $request->password],
                $request->get('remember')
            )
        ) {
        }
    }
}
