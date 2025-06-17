<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kosakata;

class KosakataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
                [
                    'kata_jawa' => 'mangan',
                    'kata_indonesia' => 'makan',
                    'contoh_kalimat' => 'Aku mangan sega.',
                    'contoh_kalimat_id' => 'Saya makan nasi.',
                    'jenis_kata' => 'verba',
                ],
                [
                    'kata_jawa' => 'turu',
                    'kata_indonesia' => 'tidur',
                    'contoh_kalimat' => 'Dheweke turu awan.',
                    'contoh_kalimat_id' => 'Dia tidur siang.',
                    'jenis_kata' => 'verba',
                ],
                [
                    'kata_jawa' => 'mlaku',
                    'kata_indonesia' => 'jalan',
                    'contoh_kalimat' => 'Bocah-bocah padha mlaku menyang sekolah.',
                    'contoh_kalimat_id' => 'Anak-anak berjalan ke sekolah.',
                    'jenis_kata' => 'verba',
                ],
                [
                    'kata_jawa' => 'lungo',
                    'kata_indonesia' => 'pergi',
                    'contoh_kalimat' => 'Aku arep lungo menyang pasar.',
                    'contoh_kalimat_id' => 'Saya mau pergi ke pasar.',
                    'jenis_kata' => 'verba',
                ],
                [
                    'kata_jawa' => 'teka',
                    'kata_indonesia' => 'datang',
                    'contoh_kalimat' => 'Dheweke teka esuk.',
                    'contoh_kalimat_id' => 'Dia datang pagi hari.',
                    'jenis_kata' => 'verba',
                ],
                [
                    'kata_jawa' => 'bengi',
                    'kata_indonesia' => 'malam',
                    'contoh_kalimat' => 'Aku sinau bengi.',
                    'contoh_kalimat_id' => 'Saya belajar malam hari.',
                    'jenis_kata' => 'nomina',
                ],
            ];

            foreach ($data as $item) {
                Kosakata::create($item);
            }
        }
    }
