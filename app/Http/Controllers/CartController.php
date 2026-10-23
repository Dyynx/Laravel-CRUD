<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Add product to cart (AJAX)
     */
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += $request->qty;
        } else {
            $cart[$product->id] = [
                'nama' => $product->nama,
                'harga' => $product->harga,
                'qty' => $request->qty,
                'gambar' => $product->gambar,
            ];
        }

        session(['cart' => $cart]);

        return response()->json(['success' => true, 'message' => 'Produk ditambahkan ke keranjang']);
    }

    /**
     * View cart
     */
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        return view('products.cart', compact('cart', 'total'));
    }

    /**
     * Remove from cart
     */
    public function removeFromCart($product_id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product_id]);
        session(['cart' => $cart]);

        return redirect('/cart')->with('success', 'Produk dihapus dari keranjang');
    }
}
