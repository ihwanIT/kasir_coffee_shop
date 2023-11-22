<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\kasir\menu;
use App\Models\order;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        // \App\Models\kasir\menu::factory(10)->create();

        // user
        User::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        // menu
        menu::create([
            'nama' => 'magelangan',
            'kategori' => 'makanan',
            'harga' => '10.000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es teh',
            'kategori' => 'minuman',
            'harga' => '3.000',
        ]);
        menu::create([
            'nama' => 'kopi hitam',
            'kategori' => 'coffee',
            'harga' => '5000',
        ]);
        menu::create([
            'nama' => 'es jeruk',
            'kategori' => 'minuman',
            'harga' => '5000',
        ]);

        // orders
        order::create([
            "nama_pembeli" => 'bari',
            "nama_orderan" => 'kopi hitam',
            "keterangan" => 'gula di kurangin dikit',
            "jumlah" => '5',
        ]);
    }
}
