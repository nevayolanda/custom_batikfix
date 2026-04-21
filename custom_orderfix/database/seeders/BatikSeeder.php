<?php

namespace Database\Seeders;

use App\Models\Batik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatikSeeder extends Seeder
{
    public function run(): void
    {
        $batik = [
            [
                'nama_batik' => 'Batik Parang Rusak',
                'deskripsi' => 'Motif tradisional dari Yogyakarta dengan pola garis diagonal yang melambangkan kekuatan dan keteguhan hati.',
                'gambar_batik' => null,
            ],
            [
                'nama_batik' => 'Batik Megamendung',
                'deskripsi' => 'Motif awan yang indah dan mengalun, mencerminkan keindahan alam dan kelancaran rezeki.',
                'gambar_batik' => null,
            ],
            [
                'nama_batik' => 'Batik Kawung',
                'deskripsi' => 'Pola lingkaran bulat yang menyerupai buah kolang-kaling, melambangkan keabadian.',
                'gambar_batik' => null,
            ],
            [
                'nama_batik' => 'Batik Garuda',
                'deskripsi' => 'Motif burung garuda yang gagah, simbol kewibawaan dan kehormatan bangsa Indonesia.',
                'gambar_batik' => null,
            ],
            [
                'nama_batik' => 'Batik Sekar Jagad',
                'deskripsi' => 'Motif bunga-bunga indah yang saling berkaitan, mencerminkan keindahan alam ciptaan Tuhan.',
                'gambar_batik' => null,
            ],
            [
                'nama_batik' => 'Batik Semen',
                'deskripsi' => 'Pola kecil yang rumit dengan berbagai elemen alam, melambangkan kesuburan dan kemakmuran.',
                'gambar_batik' => null,
            ],
        ];

        foreach ($batik as $item) {
            Batik::create($item);
        }
    }
}
