<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use ElephantIO\Client as SocketIOClient;

class NotifController extends Controller
{
    public function notifikasi($user_id)
    {
        $notifikasi = Notifikasi::where('user_id', $user_id)->where('is_read', false)->get();
        return response()->json(['data' => $notifikasi, 'message' => 'data berhasil dikirim ke websocket']);
    }

    public function notifikasiIsRead($user_id)
    {
        $notifikasi = Notifikasi::where('user_id', $user_id)->where('is_read', true)->get();
        return response()->json(['data' => $notifikasi, 'message' => 'success']);
    }
    public function updateIsRead(Request $request)
    {
        // Update data is_read ke true
        $notifikasi = Notifikasi::where('is_read', false)->update(['is_read' => true]);
        // $allNotifikasi = Notifikasi::where('is_read', true)->get();

        // Respon ke pengguna
        return response()->json(['message' => 'Data is_read telah diperbarui.']);
    }
}
