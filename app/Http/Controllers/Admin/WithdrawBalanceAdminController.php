<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\WithdrawBalance;
use Illuminate\Http\Request;

class WithdrawBalanceAdminController extends Controller
{
    public function getWithdrawBalance()
    {
        try {
            //code...
            $user = User::get();
            $withdrawBalance = WithdrawBalance::get();
            return view('Admin.pages.withdraw-balance.index', compact('withdrawBalance', 'user'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }

    public function getWithdrawBalanceById($id)
    {
        try {
            //code...
            $withdrawBalance = WithdrawBalance::where('id', $id)->first();
            return view('Admin.pages.withdraw-balance.index', compact('withdrawBalance'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }
    public function createWithdrawBalance(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'user_id' => 'required',
                'status_withdraw' => 'required',
                'amount_withdraw' => 'required',
            ]);

            // user id
            $user_id = $request->user_id;
            // ambil data user dengan data point di wallet
            $user_data = UserWallet::with("users")->where('user_id', $user_id)->first();
            // simpan data point user 
            $user_available_balance = $user_data->current_balance;
            // ambil data reward yang akan dipanggil.

            // cek poin user dengan poin yang reward butuhkan.
            if ($user_available_balance < 300000) {
                toast('Saldo Kurang dari 300.000', 'success');
            } else if ($user_available_balance < $request->amount_withdraw) {
                toast('Saldo Tidak Mencukupi', 'success');
            } else {
                $withdrawBalance = WithdrawBalance::create([
                    'user_id' => $user_id,
                    'status_withdraw' => 'Pending',
                    'amount_withdraw' => $request->amount_withdraw,
                ]);
                toast('Berhasil Create Withdraw Balance', 'success');
            }

            return redirect('/admin/withdraw-balance');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }

    public function updateWithdrawBalance(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'user_id' => 'required',
                'amount_withdraw' => 'required',
            ]);

            // user harus login
            $user_id = $request->user_id;
            // ambil data user dengan data point di wallet
            $user_data = UserWallet::with("users")->where('user_id', $user_id)->first();
            // simpan data point user 
            $user_available_balance = $user_data->current_balance;
            // ambil data reward yang akan dipanggil.

            // cek poin user dengan poin yang reward butuhkan.
            if ($user_available_balance < 300000) {
                toast('Saldo Kurang dari 300.000', 'success');
            } else if ($user_available_balance < $request->amount_withdraw) {
                toast('Saldo Tidak Mencukupi', 'success');
            } else {
                $withdrawBalance = WithdrawBalance::find($id);
                $withdrawBalance->update([
                    'user_id' => $request->user_id,
                    'amount_withdraw' => $request->amount_withdraw,
                ]);
                toast('Berhasil Update Withdraw Balance', 'success');
            }

            return redirect('/admin/withdraw-balance');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }

    public function deleteWithdrawBalance($id)
    {
        try {

            WithdrawBalance::where('id', $id)->first()->delete();

            toast('Berhasil Delete Withdraw Balance', 'success');
            return redirect('/admin/withdraw-balance');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }

    public function updateWithdrawBalanceStatus(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'status_withdraw' => 'required',
            ]);

            $withdrawBalance = WithdrawBalance::find($id);
            $withdrawBalance->update([
                'status_withdraw' => $request->status_withdraw,
            ]);

            toast('Berhasil Update Withdraw Balance Status', 'success');
            return redirect('/admin/withdraw-balance');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/withdraw-balance');
        }
    }
}
