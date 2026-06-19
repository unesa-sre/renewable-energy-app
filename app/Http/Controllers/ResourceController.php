<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    private function getResourcesData()
    {
        return [
            'solar' => [
                'name' => 'Solar Energy',
                'icon' => '☀️',
                'description' => 'Memanfaatkan energi matahari melalui teknologi fotovoltaik dan termal untuk menghasilkan listrik bersih.',
                'image' => 'assets/images/resources/solar.png', // Folder: public/assets/images/resources/solar.png
                'detail_text' => 'Energi surya adalah sumber energi terbarukan yang paling melimpah di bumi. Teknologi ini bekerja dengan menangkap sinar matahari menggunakan sel fotovoltaik (PV) yang kemudian mengubahnya menjadi listrik arus searah (DC). Melalui inverter, daya ini diubah menjadi arus bolak-balik (AC) yang dapat digunakan untuk kebutuhan rumah tangga dan industri.'
            ],
            'wind' => [
                'name' => 'Wind Energy',
                'icon' => '💨',
                'description' => 'Mengonversi energi kinetik angin menggunakan turbin canggih untuk menyuplai daya ke jaringan listrik.',
                'image' => 'assets/images/resources/wind.png',
                'detail_text' => 'Energi angin memanfaatkan kekuatan hembusan angin untuk memutar bilah turbin. Putaran ini menggerakkan poros yang terhubung ke generator untuk menghasilkan listrik. Indonesia memiliki potensi besar di wilayah pesisir untuk pengembangan Pembangkit Listrik Tenaga Bayu (PLTB).'
            ],
            'hydro' => [
                'name' => 'Hydro Power',
                'icon' => '💧',
                'description' => 'Memanfaatkan aliran air dan bendungan untuk menggerakkan turbin generator listrik skala besar.',
                'image' => 'assets/images/resources/hydro.png',
                'detail_text' => 'Energi hidroelektrik dihasilkan dari pergerakan air, biasanya dari sungai atau bendungan. Aliran air yang jatuh memutar turbin yang kemudian mengaktifkan generator. Ini adalah salah satu sumber energi terbarukan tertua dan paling stabil dalam kestabilan jaringan listrik.'
            ],
            'bioenergy' => [
                'name' => 'Bioenergy',
                'icon' => '🌱',
                'description' => 'Energi terbarukan dari bahan organik (biomassa) yang dapat diolah menjadi bahan bakar atau listrik.',
                'image' => 'assets/images/resources/bioenergy.png',
                'detail_text' => 'Bioenergi berasal dari biomassa (bahan organik) seperti limbah pertanian, kayu, dan kotoran hewan. Biomassa dapat dibakar secara langsung atau diubah menjadi biogas dan biofuel untuk transportasi atau pembangkitan listrik.'
            ],
            'geothermal' => [
                'name' => 'Geothermal Energy',
                'icon' => '🌋',
                'description' => 'Mengambil panas dari perut bumi untuk pemanas langsung atau pembangkit listrik tenaga panas bumi.',
                'image' => 'assets/images/resources/geothermal.png',
                'detail_text' => 'Energi panas bumi berasal dari panas yang tersimpan di bawah permukaan bumi. Air panas atau uap dari dalam bumi diekstraksi melalui sumur untuk memutar turbin pembangkit listrik. Indonesia memegang cadangan panas bumi terbesar di dunia.'
            ],
            'storage' => [
                'name' => 'Energy Storage',
                'icon' => '🔋',
                'description' => 'Solusi penyimpanan energi modern menggunakan baterai dan teknologi inovatif lainnya.',
                'image' => 'assets/images/resources/storage.png',
                'detail_text' => 'Sistem penyimpanan energi sangat krusial untuk mengatasi sifat intermiten dari energi surya dan angin. Teknologi baterai lithium-ion dan alternatif lainnya memungkinkan penyimpanan daya berlebih untuk digunakan saat sumber utama tidak tersedia.'
            ],
            'sustainable' => [
                'name' => 'Sustainable Living',
                'icon' => '🏡',
                'description' => 'Gaya hidup ramah lingkungan melalui efisiensi energi dan pengurangan jejak karbon.',
                'image' => 'assets/images/resources/sustainable.png',
                'detail_text' => 'Gaya hidup berkelanjutan melibatkan pengurangan konsumsi sumber daya dan penggunaan teknologi efisien energi seperti lampu LED, peralatan hemat daya, serta penerapan desain bangunan hijau yang meminimalkan kebutuhan pendinginan atau pemanasan buatan.'
            ],
        ];
    }

    public function index()
    {
        $categories = $this->getResourcesData();
        return view('pages.resources', compact('categories'));
    }

    public function show($category)
    {
        $data = $this->getResourcesData();
        
        if (!isset($data[$category])) {
            abort(404);
        }

        $resource = $data[$category];
        return view('pages.resource-detail', compact('resource', 'category'));
    }
}
