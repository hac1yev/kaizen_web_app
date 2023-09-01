<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quotes;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/quote.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		Quotes::create([
    			'id' => $data['id'],
    			'content' => $data['content'],
    			'author' => $data['author'],
    			'status' => 1,
    			'created_at' => $data['created'],
                'updated_at' => $data['created']

    		]);
    	}
    }
}
