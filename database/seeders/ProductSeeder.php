<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['nama' => 'Kangkung', 'harga' => 20000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'kangkung-1024x724.png'],
            ['nama' => 'Bayam', 'harga' => 20000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'Gambar-Daun-Bayam.jpg'],
            ['nama' => 'Seledri', 'harga' => 35000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'Inilah-X-Manfaat-Daun-Seledri-untuk-Kesehatan.jpg.webp'],
            ['nama' => 'Pakcoy', 'harga' => 20000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'tips-memilih-pakcoy-segarjpg-20221003062126.jpg'],
            ['nama' => 'Selada', 'harga' => 35000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'no_brand_sayur_selada_keriting_1_kg_hidroponik_sayur_segar_bebas_pestisida_full01_u96i0ufl.webp'],
            ['nama' => 'Sawi Hijau', 'harga' => 20000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'sawi-1024x724.png'],
            ['nama' => 'Cabai', 'harga' => 28000, 'satuan' => '1kg', 'jumlah' => 3, 'gambar' => 'cabbe.jpg'],
            ['nama' => 'Brokoli', 'harga' => 25000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'How-to-Grow-Broccoli-Hydroponically1-1024x1024.jpg'],
            ['nama' => 'Tomat', 'harga' => 15000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'tanaman-tomat_11.jpeg'],
            ['nama' => 'Terong', 'harga' => 15000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'eggplant-bg.jpg'],
            ['nama' => 'Timun', 'harga' => 15000, 'satuan' => '1kg', 'jumlah' => 5, 'gambar' => 'timun.jpg'],
            ['nama' => 'Daun Bawang', 'harga' => 30000, 'satuan' => '1kg', 'jumlah' => 3, 'gambar' => 'Daun-Bawang.jpg'],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
