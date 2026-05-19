<?php

namespace Database\Seeders;

use App\Models\Bird;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BirdSeeder extends Seeder
{
    public function run(): void
    {
        $initialBirds = [ // <-- TANDA INI YANG KURANG
            ['name' => 'Burung Kenari', 'type' => 'Burung Kicau', 'image' => 'img/birds/kenari.jpeg', 'price' => 150000, 'description' => 'Nikmati alunan merdu dari Kenari pilihan. Perawatannya mudah dan cocok untuk pemula maupun master.', 'weight' => '80-120g', 'origin' => 'Lokal', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Lovebird', 'type' => 'Burung Hias', 'image' => 'img/birds/lovebird.jpeg', 'price' => 250000, 'description' => 'Hadirkan keceriaan di rumah dengan warna-warni cantik dan sifat sosial Lovebird yang menggemaskan.', 'weight' => '40-60g', 'origin' => 'Import', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Gagak', 'type' => 'Burung Hias', 'image' => 'img/birds/gagak.jpeg', 'price' => 250000, 'description' => 'Burung cerdas dengan bulu hitam legam yang eksotis. Peliharaan unik yang menunjukkan kelas tersendiri.', 'weight' => '500-700g', 'origin' => 'Lokal', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Merpati', 'type' => 'Burung Hias', 'image' => 'img/birds/merpati.jpeg', 'price' => 100000, 'description' => 'Simbol kesetiaan dengan sifat yang jinak dan menenangkan. Sangat cocok sebagai peliharaan keluarga.', 'weight' => '300-400g', 'origin' => 'Lokal', 'quality' => 'B Grade', 'check' => 'Sehat'],
            ['name' => 'Jalak Bali', 'type' => 'Burung Kicau', 'image' => 'img/birds/jalak_bali.jpeg', 'price' => 2500000, 'description' => 'Ikon kebanggaan Bali dengan bulu putih bersih dan pelupuk mata biru yang eksotis. Sangat langka dan berkelas.', 'weight' => '90-110g', 'origin' => 'Indonesia', 'quality' => 'Top Grade', 'check' => 'Bersertifikat'],
            ['name' => 'Burung Cucak Ijo', 'type' => 'Burung Kicau', 'image' => 'img/birds/cucak_ijo.jpeg', 'price' => 300000, 'description' => 'Dikenal dengan warna hijau khas dan kicauan "ngentrok" yang bervariasi. Jagoan di arena perlombaan.', 'weight' => '50-70g', 'origin' => 'Sumatera', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Murai', 'type' => 'Burung Kicau', 'image' => 'img/birds/murai.jpeg', 'price' => 350000, 'description' => 'Sang primadona dengan ekor panjang menawan dan volume kicauan dahsyat. Investasi terbaik untuk kicau mania.', 'weight' => '30-40g', 'origin' => 'Medan', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Kacer', 'type' => 'Burung Kicau', 'image' => 'img/birds/kacer.jpeg', 'price' => 280000, 'description' => 'Gaya tarung "ngobra" yang khas dengan warna hitam putih elegan. Pilihan favorit para juara kontes burung kicau.', 'weight' => '30-50g', 'origin' => 'Jawa', 'quality' => 'A Grade', 'check' => 'Sehat'],
            ['name' => 'Burung Merak', 'type' => 'Burung Hias', 'image' => 'img/birds/merak.jpeg', 'price' => 17500000, 'description' => 'Pancarkan kemewahan dengan ekor kipasnya yang legendaris. Burung Merak adalah simbol keindahan dan keanggunan mutlak.', 'weight' => '4-6 kg', 'origin' => 'India', 'quality' => 'Top Grade', 'check' => 'Sehat'],
        ]; // <-- DAN TANDA INI

        foreach ($initialBirds as $birdData) {
            Bird::create(array_merge($birdData, [
                'slug' => Str::slug($birdData['name'])
            ]));
        }
    }
}