<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GambarBannerAdminController extends Controller
{
    public function getGambarBannerCarousel()
    {
        try {
            //code...
            $baseURL = env('FASTNETWORK_BASE_URL_API');
            $response = Http::get($baseURL . 'gambar-banner');

            if ($response->successful()) {
                $carousel = $response->json();
                // dd($carousel);
                return view('Admin.pages.gambar-carousel.index', compact('carousel'));
            } else {
                abort($response->status(), 'Failed to fetch data from API');
            }


            // $product = Product::get();
            // return view('Admin.pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/gambar-banner-carousel');
        }
    }
    public function getGambarBannerInformasi()
    {
        try {
            //code...
            $baseURL = env('FASTNETWORK_BASE_URL_API');
            $response = Http::get($baseURL . 'gambar-informasi-banner');
            // dd($response);
            if ($response->successful()) {
                $banner = $response->json();
                // dd($banner);
                return view('Admin.pages.gambar-banner.index', compact('banner'));
            } else {
                abort($response->status(), 'Failed to fetch data from API');
            }


            // $product = Product::get();
            // return view('Admin.pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/gambar-informasi-banner');
        }
    }
}
