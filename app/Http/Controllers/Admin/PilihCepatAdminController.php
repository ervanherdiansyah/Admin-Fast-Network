<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PilihanPencairan;
use Illuminate\Http\Request;

class PilihCepatAdminController extends Controller
{
    public function getPilihanCepat()
    {
        try {
            //code...
            $pilihan = PilihanPencairan::get();
            return view('Admin.pages.pilihan_cepat.index', compact('pilihan'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/pilihan-cepat');
        }
    }

    public function getPilihanCepatById($id)
    {
        try {
            //code...
            $pilihan = PilihanPencairan::where('id', $id)->first();
            return view('Admin.pages.pilihan_cepat.index', compact('pilihan'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/pilihan-cepat');
        }
    }
    public function createPilihanCepat(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'nominal' => 'required',
            ]);


            $pilihan = PilihanPencairan::create([
                'nominal' => $request->nominal,
            ]);

            toast('Berhasil Create pilihan Cepat', 'success');
            return redirect('/admin/pilihan-cepat');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/pilihan-cepat');
        }
    }

    public function updatePilihanCepat(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'nominal' => 'required',
            ]);

            $pilihan = PilihanPencairan::find($id);
            $pilihan->update([
                'nominal' => $request->nominal,
            ]);

            toast('Berhasil Update Pilihan Cepat', 'success');
            return redirect('/admin/pilihan-cepat');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/pilihan-cepat');
        }
    }

    public function deletePilihanCepat($id)
    {
        try {

            PilihanPencairan::where('id', $id)->first()->delete();

            toast('Berhasil Delete Pilihan Cepat', 'success');
            return redirect('/admin/pilihan-cepat');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/pilihan-cepat');
        }
    }
}
