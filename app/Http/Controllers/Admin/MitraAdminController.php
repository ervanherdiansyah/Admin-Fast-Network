<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MitraAdminController extends Controller
{
    public function getMitra()
    {
        $mitra = User::where('role', 'mitra')->latest()->paginate(10);
        return view('Admin.pages.mitra.index', compact('mitra'));
    }
}
