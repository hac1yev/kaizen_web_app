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
        		'facebook' => 'facebook',
        		'twitter' => 'twitter',
        		'instagram' => 'instagram',
        		'linkedin' => 'linkedin',
        		'telegram' => 'telegram',
        		'tiktok' => 'tiktok',
        		'status' => 1,
        	],
        	

        ];

        foreach($datas as $data)
        {
        	SocialMedia::create($data);
        }
    }
}
