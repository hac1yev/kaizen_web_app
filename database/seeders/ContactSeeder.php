<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/contact.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		Contact::create([
    			'id' => $data['id'],
    			'name' => $data['name'],
    			'email' => $data['email'],
    			'message' => $data['message'],
    			'status' => $data['view'],
    			'isanswer' => $data['isanswer'],
    			'created_at' => $data['created'],
                'updated_at' => $data['created']

    		]);
    	}
    }
}
