<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['max:255', 'unique:'.User::class],
            'new_password' => ['required', 'confirmed', 'min:8'],
            // 'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'username.required' => 'Tên tài khoản không để trống',
            'username.max' => 'Tên tài khoản quá dài',
            'phone.required' => 'Số điện thoại không để trống',
            'phone.unique' => 'Số điện thoại đã được đăng ký',

            'email.unique' => 'Email đã được đăng ký',
            'new_password.required' => 'Mật khẩu mới không để trống',
            'new_password.min' => 'Mật khẩu mới ít nhất 8 ký tự',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới chưa khớp.',

        ]
    );


        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->new_password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
