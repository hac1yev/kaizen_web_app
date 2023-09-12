<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
        	[
        		'facebook' => 'https://www.facebook.com/kaizenazerbaycan/',
        		'twitter' => 'https://twitter.com/kaizenaz_',
        		'instagram' => 'https://www.instagram.com/kaizen.az/',
        		'linkedin' => 'https://www.linkedin.com/company/kaizenaz',
        		'telegram' => 'https://t.me/kaizen_az',
        		'tiktok' => 'https://www.tiktok.com/@kaizen.az?is_from_webapp=1&sender_device=pc',
        		'status' => 1,
        	],
        	

        ];

        foreach($datas as $data)
        {
        	SocialMedia::create($data);
        }
    }
}
