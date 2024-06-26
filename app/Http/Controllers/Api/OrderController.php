<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Paket;
use App\Models\Product;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getAllOrder()
    {
        try {
            $orders = Order::paginate(10);

            return response()->json(['data' => $orders, 'status' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve orders', 'status' => 'Error'], 500);
        }
    }

    public function getOrderById($id)
    {
        try {
            $orders = Order::where('id', $id)->first();

            return response()->json(['data' => $orders, 'status' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve orders', 'status' => 'Error'], 500);
        }
    }

    public function getOrderByUserId()
    {
        try {
            $orders = Order::with('orderDetail.products', 'users', 'paket')->where('user_id', Auth::user()->id)->where('status', 'Paid')->latest()->get();

            return response()->json(['data' => $orders, 'status' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to retrieve orders', 'status' => 'Error'], 500);
        }
    }

    public function getOrderByUserIdOnOrder()
    {
        try {
            $orders = Order::with('orderDetail.products', 'users', 'paket')->where('user_id', Auth::user()->id)->where('status', 'Pending')->latest()->first();

            return response()->json(['data' => $orders, 'status' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'Error'], 500);
        }
    }

    public function addToOrder(Request $request)
    {
        // Validasi input
        // $validator = Validator::make($request->all(), [
        //     'products' => 'required|array', // Array produk yang akan ditambahkan
        //     'products.*.id' => 'required|integer|exists:products,id', // ID produk harus ada dalam tabel produk
        //     'products.*.quantity' => 'required|integer|min:1', // Jumlah produk minimal 1
        // ]);

        // Cek apakah validasi gagal
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()->first()], 400);
        // }

        // Ambil paket
        $paketId = $request->input('paketId');
        $paket = Paket::findOrFail($paketId);
        $maxQuantity = $paket->max_quantity;
        $paketCode = $paket->paket_kode;
        $hargaPaket = $paket->price;


        $jsonData = $request->all();

        // Inisialisasi variabel untuk menyimpan jumlah total produk
        $totalQuantity = 0;

        // Iterasi melalui array produk
        foreach ($jsonData['products'] as $product) {
            // Tambahkan jumlah produk ke totalQuantity
            $totalQuantity += $product['quantity'];
        }
        // Mulai transaksi database
        DB::beginTransaction();

        try {

            // Buat order baru
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->paket_id = $request->paketId;
            $order->order_code = $paketCode . now()->format('Ymd') . rand(10, 99);
            $order->order_date = now();
            $order->status = 'Pending';
            $order->total_harga = $hargaPaket;
            $order->save();

            // Buat detail order untuk setiap produk
            foreach ($request->input('products') as $product) {
                // Cek ketersediaan stok produk
                $requestedQuantity = $product['quantity'];

                $productId = $product['product_id'];
                $requestedProduct = Product::find($productId);

                if (!$requestedProduct || $requestedQuantity > $requestedProduct->stock) {
                    DB::rollback();
                    return response()->json(['error' => 'Requested quantity exceeds available stock'], 400);
                }

                // Cek apakah jumlah produk yang diminta lebih dari max quantity
                if ($totalQuantity > $maxQuantity) {
                    DB::rollback();
                    return response()->json(['error' => 'Requested quantity exceeds maximum quantity allowed'], 400);
                } elseif ($totalQuantity < $maxQuantity) {
                    DB::rollback();
                    return response()->json(['error' => 'Requested quantity exceeds minumum quantity allowed'], 400);
                }

                // Buat detail order untuk produk ini
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $productId;
                $orderDetail->quantity = $requestedQuantity;
                $orderDetail->save();
            }

            // Commit transaksi
            DB::commit();

            return response()->json(['message' => 'Products added to order successfully'], 200);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return response()->json(['error' => 'Failed to add products to order'], 500);
        }
    }
}
