<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostBookmark;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/users.json";
        $json_data = file_get_contents($filePath);
        $json = json_decode($json_data, true);
        $datas = $json[2]['data'];

        foreach ($datas as $data) {
            $bookPosts = explode(',', trim($data['bookmarked_posts'], ',')); 

            foreach ($bookPosts as $postID) {
                if (!empty($postID)) { 
                    PostBookmark::create([
                        'user_id' => $data['id'],
                        'post_id' => $postID,
                    ]);
                }
            }
        }
    }
}
