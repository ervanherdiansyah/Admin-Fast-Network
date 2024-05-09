<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagementUserAdminController extends Controller
{
    public function getUser()
    {
        try {
            //code...
            $users = User::get();
            return view('Admin.pages.management-users.index', compact('users'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/management-user');
        }
    }

    public function getUserById($id)
    {
        try {
            //code...
            $users = User::where('id', $id)->first();
            return view('Admin.pages.management-users.index', compact('users'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/management-user');
        }
    }
    public function createUser(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'referral' => 'required',
                'password' => 'required|min:8|confirmed'
            ]);

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            $users = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'referral' => $randomString,
                'password' => bcrypt($request->password),
            ]);

            toast('Berhasil Create User', 'success');
            return redirect('/admin/management-user');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/management-user');
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'referral' => 'required',
            ]);

            $users = User::find($id);
            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'referral' => $request->referral,
            ]);

            toast('Berhasil Update User', 'success');
            return redirect('/admin/management-user');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/management-user');
        }
    }

    public function deleteUser($id)
    {
        try {

            User::where('id', $id)->first()->delete();

            toast('Berhasil Delete User', 'success');
            return redirect('/admin/management-user');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/management-user');
        }
    }

    public function changePasswordUser(Request $request, $id)
    {
        try {

            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

            $users = User::find($id);
            $users->update([
                'password' => Hash::make($request->password),
            ]);

            toast('Berhasil Ubah Password User', 'success');
            return redirect('/admin/management-user');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/management-user');
        }
    }

    public function generateReferral()
    {
        // Logika untuk menghasilkan kode referral baru, misalnya menggunakan Str::random() atau sejenisnya
        $newCode = Str::random(6); // Menghasilkan kode acak 6 karakter

        // Mengembalikan kode referral yang baru dihasilkan sebagai respons
        return response()->json(['code' => $newCode]);
    }
}
