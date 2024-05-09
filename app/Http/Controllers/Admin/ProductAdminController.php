<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    public function getProduct()
    {
        try {
            //code...
            $product = Product::get();
            return view('Admin.pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/product');
        }
    }

    public function getProductById($id)
    {
        try {
            //code...
            $product = Product::where('id', $id)->first();
            return view('Admin.pages.product.index', compact('product'));
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/product');
        }
    }
    public function createProduct(Request $request)
    {
        try {
            //code...
            Request()->validate([
                'product_name' => 'required',
                'image' => 'nullable',
                'stock' => 'required',
            ]);

            $file_name = null;
            if ($request->hasFile('image')) {
                $file_name = $request->image->getClientOriginalName();
                $namaGambar = str_replace(' ', '_', $file_name);
                $image = $request->image->storeAs('public/product', $namaGambar);
            }


            $product = Product::create([
                'product_name' => $request->product_name,
                'image' =>  $file_name ? "product/" . $namaGambar : null,
                'stock' => $request->stock,
            ]);

            toast('Berhasil Create Product', 'success');
            return redirect('/admin/product');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/product');
        }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            //code...
            Request()->validate([
                'product_name' => 'required',
                'image' => 'nullable',
                'stock' => 'required',
            ]);

            $product = Product::find($id);
            if (Request()->hasFile('image') && Request()->file('image')->isValid()) {
                if (!empty($product->image) && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }
                $file_name = $request->image->getClientOriginalName();
                $namaGambar = str_replace(' ', '_', $file_name);
                $image = $request->image->storeAs('public/product', $namaGambar);
                $product->update([
                    'product_name' => $request->product_name,
                    'image' => "product/" . $namaGambar,
                    'stock' => $request->stock,
                ]);
            } else {
                $product->update([
                    'product_name' => $request->product_name,
                    'stock' => $request->stock,
                ]);
            }

            toast('Berhasil Update Product', 'success');
            return redirect('/admin/product');
        } catch (\Throwable $th) {
            //throw $th;
            toast($th->getMessage(), 'warning');
            return redirect('/admin/product');
        }
    }

    public function deleteProduct($id)
    {
        try {

            Product::where('id', $id)->first()->delete();

            toast('Berhasil Delete Product', 'success');
            return redirect('/admin/product');
        } catch (\Throwable $th) {
            //throw $th;
            toast('Error!!!', 'warning');
            return redirect('/admin/product');
        }
    }
}
