<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Paket;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        try {
            $chart_data = [
                ["month_name" => "Jan", "total" => 0],
                ["month_name" => "Feb", "total" => 0],
                ["month_name" => "Mar", "total" => 0],
                ["month_name" => "Apr", "total" => 0],
                ["month_name" => "May", "total" => 0],
                ["month_name" => "Jun", "total" => 0],
                ["month_name" => "Jul", "total" => 0],
                ["month_name" => "Aug", "total" => 0],
                ["month_name" => "Sep", "total" => 0],
                ["month_name" => "Oct", "total" => 0],
                ["month_name" => "Nov", "total" => 0],
                ["month_name" => "Dec", "total" => 0],
            ];

            // Total Pendapatan
            $paids = Order::get();
            foreach ($paids as $paid) {
                $paket = Paket::where('id', $paid->paket_id)->first();

                // Tanggal yang diberikan
                $tanggal = $paid->order_date;
                // Ubah tanggal menjadi format DateTime
                $tanggal_dt = new DateTime($tanggal);
                // Ambil nama bulan dari tanggal yang diberikan
                $bulan_tanggal = $tanggal_dt->format('M');
                // dd($bulan_tanggal);

                // Looping untuk mencari bulan yang sesuai dengan bulan dari tanggal
                foreach ($chart_data as &$chartItem) {
                    if ($chartItem['month_name'] === $bulan_tanggal) {

                        $chartItem['total'] += $paket->price;
                        break;
                    }
                }
            }


            // $previousUnpainOrder = Order::where('user_id', Auth::user()->id)->where('status', 'Pending')->first();
            // if ($previousUnpainOrder) {
            //     $previousUnpainOrder->delete();
            // }
            $totalMitra =  User::where('role', 'mitra')->count();
            $totalPendapatan = Order::where('status', 'Paid')->sum('total_harga');
            // dd($chart_data);

            return view('Admin.pages.dashboard.index', compact('totalMitra', 'totalPendapatan', 'chart_data'));
        } catch (\Throwable $th) {
            Alert::toast('Error!!!', 'warning');
        }
    }
}
