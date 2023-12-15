<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\kasir\menu;
use App\Models\order;
use App\Models\stok;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(3)->create();
        // \App\Models\kasir\menu::factory(10)->create();

        // user
        User::create([
            'nama' => 'fulan',
            'email' => 'fulan@email.com',
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        // menu
        menu::create([
            'nama' => 'americano',
            'kategori' => 'Minuman',
            'harga' => 17000,
            'jumlah' => 30,
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'Minuman',
            'harga' => 7000,
            'jumlah' => 20,
        ]);
        menu::create([
            'nama' => 'kopi gula aren',
            'kategori' => 'Minuman',
            'harga' => 9000,
            'jumlah' => 40,
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'Minuman',
            'harga' => 7000,
            'jumlah' => 20,
        ]);
        menu::create([
            'nama' => 'es tebu',
            'kategori' => 'Minuman',
            'harga' => 9000,
            'jumlah' => 40,
        ]);
        menu::create([
            'nama' => 'pangsit',
            'kategori' => 'Makanan',
            'harga' => 9000,
            'jumlah' => 40,
        ]);
        menu::create([
            'nama' => 'magelangan',
            'kategori' => 'Makanan',
            'harga' => 7000,
            'jumlah' => 20,
        ]);
        menu::create([
            'nama' => 'mie ayam',
            'kategori' => 'Makanan',
            'harga' => 9000,
            'jumlah' => 40,
        ]);
        // stok
        stok::create([
            "bahan_baku" => 'coklat bubuk',
            "jumlah_stok" => '10',
            "satuan_pengukuran" => 'Kg',
            "jumlah_cup" => '120',
            "supplier" => 'pak hamjah',
            "harga_beli" => '250000',
            "keterangan" => 'kopi arabika asal pasuruan',
        ]);
        stok::create([
            "bahan_baku" => 'gula pasir',
            "jumlah_stok" => '10',
            "satuan_pengukuran" => 'Kg',
            "jumlah_cup" => '120',
            "supplier" => 'pak hamjah',
            "harga_beli" => '250000',
            "keterangan" => 'kopi arabika asal pasuruan',
        ]);
        stok::create([
            "bahan_baku" => 'biji kopi',
            "jumlah_stok" => '10',
            "satuan_pengukuran" => 'Kg',
            "jumlah_cup" => '120',
            "supplier" => 'pak hamjah',
            "harga_beli" => '250000',
            "keterangan" => 'kopi arabika asal pasuruan',
        ]);
    }
}
