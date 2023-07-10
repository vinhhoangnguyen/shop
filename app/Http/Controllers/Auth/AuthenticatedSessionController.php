<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $notification = array(
            'message' => 'Đăng nhập thành công',
            'alert-type' => 'success'
        );


        switch($request->user()->role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard')->with($notification);
            case 'manager':
                return redirect()->intended('/manager/dashboard')->with($notification);
            case 'vendor':
                return redirect()->intended('/vendor/dashboard')->with($notification);

        }

        // return redirect()->intended(RouteServiceProvider::HOME); //redirect to HOME: '/' mặc định hoặc index Frontend
        return redirect()->intended('/customer/dashboard')->with($notification); //redirect to HOME: '/' mặc định hoặc index Frontend

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
