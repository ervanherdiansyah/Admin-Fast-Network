<?php
// app/Http/View/Composers/UserDataComposer.php

namespace App\Http\View\Composers;

use App\Models\Notifikasi;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserDataComposer
{
  public function compose(View $view)
  {
    $notifikasi = Notifikasi::where('is_read', true)->where('user_id', Auth::user()->id)->latest()->take(5)->get();

    $view->with('notifikasi', $notifikasi);
  }
}
