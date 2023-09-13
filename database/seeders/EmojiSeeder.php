<?php

namespace Database\Seeders;

use App\Models\Emoji;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmojiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'src' => '/back/assets/img/1.png',
                'label' => 'Xoşbəxt',
                'status' => 1,
            ],
            [
                'src' => '/back/assets/img/2.png',
                'label' => 'Sevgi dolu',
                'status' => 1,
            ],
            [
                'src' => '/back/assets/img/3.png',
                'label' => 'Şən',
                'status' => 1,
            ],
            [
                'src' => '/back/assets/img/4.png',
                'label' => 'Üzgün',
                'status' => 1,
            ],
            [
                'src' => '/back/assets/img/5.png',
                'label' => 'Sıxılmış',
                'status' => 1,
            ],
        ];

        foreach($data as $item)
        {
            Emoji::create($item);
        }
    }
}
