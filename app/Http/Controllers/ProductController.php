<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource with search.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        if ($search) {
            $products = Product::where('nama', 'like', '%' . $search . '%')->get();
        } else {
            $products = Product::all();
        }
        
        return view('products.index', compact('products', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'satuan' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'required|string',
        ]);

        Product::create($request->all());
        return redirect('/admin/dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'satuan' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar' => 'required|string',
        ]);

        $product->update($request->all());
        return redirect('/admin/dashboard')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/dashboard')->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Admin dashboard - list all products
     */
    public function adminDashboard()
    {
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }
}
