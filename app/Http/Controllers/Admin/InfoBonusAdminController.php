<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoBonus;
use Illuminate\Http\Request;

class InfoBonusAdminController extends Controller
{
    public function getInfo()
    {
        try {
            //code...
            $info = InfoBonus::get();
            return view('Admin.pages.info_bonus.index', compact('info'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/info');
        }
    }

    public function getInfoById($id)
    {
        try {
            //code...
            $info = InfoBonus::where('id', $id)->first();
            return view('Admin.pages.info_bonus.index', compact('info'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/info');
        }
    }
    public function createInfo(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'deskripsi' => 'required',
            ]);


            $info = InfoBonus::create([
                'deskripsi' => $request->deskripsi,
            ]);

            toast('Berhasil Create Info Bonus', 'success');
            return redirect('/admin/info');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/info');
        }
    }

    public function updateInfo(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'deskripsi' => 'required',
            ]);

            $info = InfoBonus::find($id);
            $info->update([
                'deskripsi' => $request->deskripsi,
            ]);

            toast('Berhasil Update Info Bonus', 'success');
            return redirect('/admin/info');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/info');
        }
    }

    public function deleteInfo($id)
    {
        try {

            InfoBonus::where('id', $id)->first()->delete();

            toast('Berhasil Delete Info Bonus', 'success');
            return redirect('/admin/info');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/info');
        }
    }
}
