<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/posts.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		Posts::create([
    			'id' => $data['id'],
    			'user_id' => $data['author'],
    			'category_id' => $data['category'],
    			'title' => $data['title'],
                'slug' => Str::slug($data['title']),
    			'description' => $data['description'],
    			'content' => $data['more'],
                'tags' => $data['hashtags'],
                'image' => $data['baslik'],
                'note' => $data['note'],
                'view' => $data['clicked'],
                'reading_time' => estimatedReadingTime($data['more'], 200),
                'status' => '1',
    			'created_at' => $data['created_at'],
                'updated_at' => $data['created_at']

    		]);
    	}
    }
}
