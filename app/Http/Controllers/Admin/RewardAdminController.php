<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardAdminController extends Controller
{
    public function getReward()
    {
        try {
            //code...
            $reward = Reward::get();
            return view('Admin.pages.reward.index', compact('reward'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/reward');
        }
    }

    public function getRewardById($id)
    {
        try {
            //code...
            $reward = Reward::where('id', $id)->first();
            return view('Admin.pages.reward.index', compact('reward'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/reward');
        }
    }
    public function createReward(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'reward_name' => 'required',
                'point' => 'required',
            ]);


            $reward = Reward::create([
                'reward_name' => $request->reward_name,
                'point' => $request->point,
            ]);

            toast('Berhasil Create Reward', 'success');
            return redirect('/admin/reward');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/reward');
        }
    }

    public function updateReward(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'reward_name' => 'required',
                'point' => 'required',
            ]);

            $reward = Reward::find($id);
            $reward->update([
                'reward_name' => $request->reward_name,
                'point' => $request->point,
            ]);

            toast('Berhasil Update Reward', 'success');
            return redirect('/admin/reward');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/reward');
        }
    }

    public function deleteReward($id)
    {
        try {

            Reward::where('id', $id)->first()->delete();

            toast('Berhasil Delete Reward', 'success');
            return redirect('/admin/reward');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/reward');
        }
    }
}
