<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('auths.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Jika berhasil login, arahkan ke dashboard sesuai peran
            return redirect()->intended($this->redirectTo());
        }

        toast('Username dan Password Salah!!!', 'warning');
        return redirect('/');
    }

    // Fungsi untuk menentukan rute dashboard berdasarkan peran pengguna
    protected function redirectTo()
    {
        if (Auth::user()->role === 'superadmin') {
            toast('Berhasil Login!!!', 'success');
            return '/admin/dashboard';
        } else {
            toast('Tidak memiliki access untuk login ke dashboard!!!', 'warning');
            return '/';
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // Flush all session data
        Auth::logout();
        toast('Berhasil Logout!!!', 'success');
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('auths.register');
    }

    public function createRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'no_wa' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'role_id' => 2
        ]);

        Alert::toast('berhasil Register', 'success');
        return redirect('/');
    }
}
