<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TargetBonus;
use Illuminate\Http\Request;

class TargetBonusAdminController extends Controller
{
    public function getTarget()
    {
        try {
            //code...
            $target = TargetBonus::get();
            return view('Admin.pages.target_bonus.index', compact('target'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/target');
        }
    }

    public function getTargetById($id)
    {
        try {
            //code...
            $target = TargetBonus::where('id', $id)->first();
            return view('Admin.pages.target_bonus.index', compact('target'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/target');
        }
    }
    public function createTarget(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'nominal' => 'required',
            ]);


            $target = TargetBonus::create([
                'nominal' => $request->nominal,
            ]);

            toast('Berhasil Create Target Bonus', 'success');
            return redirect('/admin/target');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/target');
        }
    }

    public function updateTarget(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'nominal' => 'required',
            ]);

            $target = TargetBonus::find($id);
            $target->update([
                'nominal' => $request->nominal,
            ]);

            toast('Berhasil Update Target Bonus', 'success');
            return redirect('/admin/target');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/target');
        }
    }

    public function deleteTarget($id)
    {
        try {

            TargetBonus::where('id', $id)->first()->delete();

            toast('Berhasil Delete Target Bonus', 'success');
            return redirect('/admin/target');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/target');
        }
    }
}
