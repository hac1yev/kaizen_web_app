<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seo;

class SeoSeeder extends Seeder
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
        		'meta_title' => 'Kaizen',
        		'meta_description' => 'Kaizen',
        		'meta_keywords' => '[{"value":"seo"},{"value":"kaizen"}]',
        		'status' => 1,
        	],
        	

        ];

        foreach($datas as $data)
        {
        	Seo::create($data);
        }
    }
}
