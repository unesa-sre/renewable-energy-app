<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Activity;
use App\Models\Research;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        User::create([
            'name' => 'Admin Eco',
            'email' => 'admin@eco.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Budi Anggota',
            'email' => 'member@eco.com',
            'password' => Hash::make('password'),
            'role' => 'anggota',
        ]);

        // 2. Articles
        Article::create([
            'title' => 'Masa Depan Panel Surya di Indonesia',
            'content' => 'Indonesia memiliki potensi energi surya yang sangat besar mengingat lokasinya di garis khatulistiwa. Teknologi sel surya semakin murah dan efisien untuk digunakan di perumahan.',
            'image' => null,
        ]);

        Article::create([
            'title' => 'Mengapa Angin adalah Energi Masa Depan',
            'content' => 'Turbin angin saat ini dapat menghasilkan listrik dalam jumlah besar dengan biaya operasional yang sangat rendah setelah instalasi selesai.',
            'image' => null,
        ]);

        // 3. Activities
        Activity::create([
            'name' => 'Penanaman Mangrove Pesisir',
            'location' => 'Pantai Indah, Jakarta',
            'date' => '2024-10-15',
            'image' => null,
        ]);

        Activity::create([
            'name' => 'Workshop Panel Surya Mandiri',
            'location' => 'Balai Kota, Bandung',
            'date' => '2024-11-20',
            'image' => null,
        ]);

        // 4. Research
        Research::create([
            'title' => 'Analisis Efisiensi Sel Fotovoltaik Generasi Ketiga',
            'description' => 'Penelitian ini mengeksplorasi penggunaan material perovskite untuk meningkatkan efisiensi penyerapan cahaya matahari di wilayah dengan radiasi tinggi.',
            'file_path' => null,
        ]);

        // 5. Products (Merch)
        Product::create([
            'name' => 'Eco-Friendly Tumbler',
            'description' => 'Tumbler stainless steel tahan panas dan dingin, membantu mengurangi pemakaian botol plastik sekali pakai.',
            'price' => 125000,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Solar Portable Lamp',
            'description' => 'Lampu meja yang dapat diisi ulang menggunakan energi matahari. Cocok untuk camping atau lampu darurat.',
            'price' => 250000,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Reusable Tote Bag EcoFuture',
            'description' => 'Tas belanja berbahan canvas organik yang kuat dan modis.',
            'price' => 45000,
            'image' => null,
        ]);
    }
}
