<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingSeeder extends Seeder
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
        		'about' => 'tesssttt',
        		'logo_buta' => 'assets/images/logo/buta_logo_FYiBfTTSZGXZk.svg',
        		'logo_kaizen_header' => 'assets/images/logo/kaizen_header_4y7fCr6BYm4Pt.svg',
        		'logo_kaizen_footer' => 'assets/images/logo/kaizen_footer_KVB0UxpM4PyBh.svg',
        		'favicon' => 'assets/images/logo/favicon_FQwof1AlNknFR.png',
        		'status' => 1,
        	],
        	

        ];

        foreach($datas as $data)
        {
        	Settings::create($data);
        }
    }
}
