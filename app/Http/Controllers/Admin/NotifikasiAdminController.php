<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiAdminController extends Controller
{
    public function getNotifikasi()
    {
        $notifikasi = Notifikasi::where('is_read', true)->get();
        return view();
    }
}
