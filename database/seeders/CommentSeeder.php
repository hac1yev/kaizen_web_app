<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/comments.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		Comment::create([
    			'id' => $data['id'],
    			'user_id' => $data['user'],
    			'post_id' => $data['article_id'],
    			'comment' => $data['comment'],
    			'likes' => $data['likes'],
    			'dislikes' => $data['dislikes'],
                'status' => $data['view'],
    			'created_at' => $data['created_at'],
                'updated_at' => $data['created_at']

    		]);
    	}
    }
}
