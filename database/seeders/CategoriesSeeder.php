<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $datas = [
        	[
        		'id' => '3',
        		'title' => 'Fərdi İnkişaf',
        		'slug' => Str::slug('Fərdi İnkişaf'),
        		'status' => '1',
        	],
        	[
        		'id' => '4',
        		'title' => 'Səyahət',
        		'slug' => Str::slug('Səyahət'),
        		'status' => '1',
        	],
        	[
        		'id' => '13',
        		'title' => 'Hekayələr',
        		'slug' => Str::slug('Hekayələr'),
        		'status' => '1',
        	],
            [
        		'id' => '14',
        		'title' => 'Filmlər',
        		'slug' => Str::slug('Filmlər'),
        		'status' => '1',
        	],
            [
        		'id' => '15',
        		'title' => 'Biznes Dünyası',
        		'slug' => Str::slug('Biznes Dünyası'),
        		'status' => '1',
        	],
            [
        		'id' => '16',
        		'title' => 'Texnologiya',
        		'slug' => Str::slug('Texnologiya'),
        		'status' => '1',
        	],
        ];

        foreach($datas as $data)
        {
        	Categories::create($data);
        }
    }
}
