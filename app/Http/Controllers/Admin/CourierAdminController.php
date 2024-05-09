<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierAdminController extends Controller
{
    public function getCourier()
    {
        try {
            //code...
            $courier = Courier::get();
            return view('Admin.pages.courier.index', compact('courier'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/courier');
        }
    }

    public function getCourierById($id)
    {
        try {
            //code...
            $courier = Courier::where('id', $id)->first();
            return view('Admin.pages.courier.index', compact('courier'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/courier');
        }
    }
    public function createCourier(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'courier_name' => 'required',
            ]);


            $courier = Courier::create([
                'courier_name' => $request->courier_name,
            ]);

            toast('Berhasil Create Courier', 'success');
            return redirect('/admin/courier');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/courier');
        }
    }

    public function updateCourier(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'courier_name' => 'required',
            ]);

            $courier = Courier::find($id);
            $courier->update([
                'courier_name' => $request->courier_name,
            ]);

            toast('Berhasil Update Courier', 'success');
            return redirect('/admin/courier');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/courier');
        }
    }

    public function deleteCourier($id)
    {
        try {

            Courier::where('id', $id)->first()->delete();

            toast('Berhasil Delete Courier', 'success');
            return redirect('/admin/courier');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/courier');
        }
    }
}
