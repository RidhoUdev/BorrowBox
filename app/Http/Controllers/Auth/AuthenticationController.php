<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login_identifier' => 'required|string',
            'password' => 'required|string',
        ],
        [
            'login_identifier.required' => 'Kolom email atau username wajib diisi.',
            'login_identifier.string' => 'Kolom email atau username harus berupa teks.',
            'password.required' => 'Kolom kata sandi wajib diisi.',
            'password.string' => 'Kolom kata sandi harus berupa teks.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                        ->withErrors($validator)
                        ->withInput($request->only('login_identifier'));
        }

        $loginInput = $request->input('login_identifier');
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        $credentials = [
            $fieldType => $loginInput,
            'password' => $request->input('password'),
        ];

        $remember = $request->boolean('remember'); 

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'admin') {
                // return redirect()->intended(route('admin.dashboard'));
            } elseif ($user->role === 'operator') {
                // return redirect()->intended(route('operator.dashboard'));
            } else {
                // return redirect()->intended(route('user'));
            }

        }

        return redirect()->back()
                         ->withInput($request->only('login_identifier', 'remember'))
                         ->withErrors(['login_identifier' => 'Email/username atau kata sandi yang Anda masukkan salah.']);
    }
}