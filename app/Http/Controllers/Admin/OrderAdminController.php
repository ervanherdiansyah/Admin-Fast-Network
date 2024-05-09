<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function getOrder()
    {
        try {
            //code...
            $order = Order::get();
            return view('Admin.pages.order.index', compact('order'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/order');
        }
    }

    public function getOrderById($id)
    {
        try {
            //code...
            $order = Order::where('id', $id)->first();
            return view('Admin.pages.order.index', compact('order'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/order');
        }
    }
    public function createOrder(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'reward_name' => 'required',
                'point' => 'required',
            ]);


            $order = Order::create([
                'reward_name' => $request->reward_name,
                'point' => $request->point,
            ]);

            toast('Berhasil Create Order', 'success');
            return redirect('/admin/order');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/order');
        }
    }

    public function updateOrder(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'reward_name' => 'required',
                'point' => 'required',
            ]);

            $order = Order::find($id);
            $order->update([
                'reward_name' => $request->reward_name,
                'point' => $request->point,
            ]);

            toast('Berhasil Update Order', 'success');
            return redirect('/admin/order');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/order');
        }
    }

    public function deleteReward($id)
    {
        try {

            Order::where('id', $id)->first()->delete();

            toast('Berhasil Delete Order', 'success');
            return redirect('/admin/order');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/order');
        }
    }
}
