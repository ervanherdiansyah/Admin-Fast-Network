<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PaketAdminController extends Controller
{
    public function getPaket()
    {
        try {
            //code...
            $baseURL = env('FASTNETWORK_BASE_URL_API');
            $response = Http::get($baseURL . 'get-package');

            if ($response->successful()) {
                $package = $response->json();
                // dd($package);
                return view('Admin.pages.paket.index', compact('package'));
            } else {
                abort($response->status(), 'Failed to fetch data from API');
            }


            // $product = Product::get();
            // return view('Admin.pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/paket');
        }
    }

    public function getPaketById($id)
    {
        try {
            //code...
            $paketDetailById = Paket::where('id', $id)->first();
            return view('Admin.pages.paket.index', compact('paketDetailById'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/paket');
        }
    }

    public function createPaket(Request $request)
    {
        try {
            //code...

            Request()->validate([
                'paket_nama' => 'required|string',
                'max_quantity' => 'required|integer',
                'price' => 'required|integer',
                'weight' => 'required|integer',
                'description' => 'required|string',
                'image' => 'nullable',
                'point' => 'required|integer',
                'paket_kode' => 'required|string',
                'value' => 'required|integer',
            ]);

            $file_name = null;
            if ($request->hasFile('image')) {
                $file_name = $request->image->getClientOriginalName();
                $namaGambar = str_replace(' ', '_', $file_name);
                $image = $request->image->storeAs('public/paket', $namaGambar);
            }

            $data = Paket::create([
                'paket_nama' => $request->paket_nama,
                'max_quantity' => $request->max_quantity,
                'price' => $request->price,
                'weight' => $request->weight,
                'description' => $request->description,
                'image' => $file_name ? "paket/" . $namaGambar : null,
                'point' => $request->point,
                'paket_kode' => $request->paket_kode,
                'value' => $request->value,
            ]);

            toast('Berhasil Create Paket', 'success');
            return redirect('/admin/paket');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/paket');
        }
    }


    public function updatePaket(Request $request, $id)
    {

        try {
            //code...
            Request()->validate([
                'paket_nama' => 'required|string',
                'max_quantity' => 'required|integer',
                'price' => 'required|integer',
                'weight' => 'required|integer',
                'description' => 'required|string',
                'image' => 'nullable',
                'point' => 'required|integer',
                'paket_kode' => 'required|string',
                'value' => 'required|integer',

            ]);

            $data = Paket::find($id);
            if (Request()->hasFile('image') && Request()->file('image')->isValid()) {
                if (!empty($data->image) && Storage::exists($data->image)) {
                    Storage::delete($data->image);
                }
                $file_name = $request->image->getClientOriginalName();
                $namaGambar = str_replace(' ', '_', $file_name);
                $image = $request->image->storeAs('public/paket', $namaGambar);

                $data->update([
                    'image' => "paket/" . $namaGambar,
                    'paket_nama' => $request->paket_nama,
                    'max_quantity' => $request->max_quantity,
                    'price' => $request->price,
                    'weight' => $request->weight,
                    'description' => $request->description,
                    'point' => $request->point,
                    'paket_kode' => $request->paket_kode,
                    'value' => $request->value,

                ]);
            } else {
                $data->update([
                    'paket_nama' => $request->paket_nama,
                    'max_quantity' => $request->max_quantity,
                    'price' => $request->price,
                    'weight' => $request->weight,
                    'description' => $request->description,
                    'point' => $request->point,
                    'paket_kode' => $request->paket_kode,
                    'value' => $request->value,

                ]);
            };

            toast('Berhasil Update Paket', 'success');
            return redirect('/admin/paket');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/paket');
        }
    }

    public function deletePaket($id)
    {
        try {
            //code...
            $deletePaket = Paket::where('id', $id)->first()->delete();
            toast('Berhasil Delete Paket', 'success');
            return redirect('/admin/paket');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/paket');
        }
    }
}
