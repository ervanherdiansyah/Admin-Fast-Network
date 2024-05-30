<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\WithdrawPoint;
use Illuminate\Http\Request;

class WithdrawPointAdminController extends Controller
{
    public function getWithdrawPoint()
    {
        try {
            //code...
            $user = User::get();
            $reward = Reward::get();
            $withdrawPoint = WithdrawPoint::get();
            return view('Admin.pages.withdraw-point.index', compact('withdrawPoint', 'user', 'reward'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-point');
        }
    }

    public function getWithdrawPointById($id)
    {
        try {
            //code...
            $withdrawPoint = WithdrawPoint::where('id', $id)->first();
            return view('Admin.pages.withdraw-point.index', compact('withdrawPoint'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-point');
        }
    }
    public function createWithdrawPoint(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'user_id' => 'required',
                'reward_id' => 'required',
                'status_withdraw' => 'required',
                'amount' => 'required',
            ]);

            $user_id = $request->user_id;
            // ambil data user dengan data point di wallet
            $user_data = UserWallet::with("users")->where('user_id', $user_id)->first();
            // simpan data point user 
            $user_available_point = $user_data->total_point;
            // ambil data reward yang akan dipanggil.
            $reward = Reward::where("id", $request->reward_id);

            // cek poin user dengan poin yang reward butuhkan.
            if ($user_available_point < $reward->point) {
                toast('Point Tidak Mencukupi!!!', 'warning');
            }

            $withdrawPoint = WithdrawPoint::create([
                'user_id' => $user_id,
                'reward_id' => $reward->id,
                'status_withdraw' => 'Pending',
                'amount' => $reward->point,
            ]);

            toast('Berhasil Create Withdraw Point', 'success');
            return redirect('/admin/withdraw-point');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-point');
        }
    }

    public function updateWithdrawPoint(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'user_id' => 'required',
                'reward_id' => 'required',
                'amount' => 'required',
            ]);

            $user_id = $request->user_id;
            // ambil data user dengan data point di wallet
            $user_data = UserWallet::with("users")->where('user_id', $user_id)->first();
            // simpan data point user 
            $user_available_point = $user_data->total_point;
            // ambil data reward yang akan dipanggil.
            $reward = Reward::where("id", $request->reward_id);
            // cek poin user dengan poin yang reward butuhkan.
            if ($user_available_point < $reward->point) {
                toast('Point Tidak Mencukupi!!!', 'warning');
            }
            $withdrawPoint = WithdrawPoint::find($id);
            $withdrawPoint->update([
                'user_id' => $user_id,
                'reward_id' => $reward->id,
                'amount' => $reward->point,
            ]);

            toast('Berhasil Update Withdraw Point', 'success');
            return redirect('/admin/withdraw-point');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/withdraw-point');
        }
    }

    public function deleteWithdrawPoint($id)
    {
        try {

            WithdrawPoint::where('id', $id)->first()->delete();

            toast('Berhasil Delete Withdraw Point', 'success');
            return redirect('/admin/withdraw-point');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-point');
        }
    }

    public function updateWithdrawPointStatus(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'status_withdraw' => 'required',
            ]);

            $withdrawPoint = WithdrawPoint::find($id);
            $withdrawPoint->update([
                'status_withdraw' => $request->status_withdraw,
            ]);

            $userWallet = UserWallet::where('user_id', $withdrawPoint->user_id)->first();
            if ($withdrawPoint->status_withdraw == 'Berhasil') {
                $userWallet->update([
                    'current_point' => $userWallet->current_point - $withdrawPoint->amount,
                ]);
            }

            toast('Berhasil Update Withdraw Point Status', 'success');
            return redirect('/admin/withdraw-point');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/withdraw-point');
        }
    }
}
