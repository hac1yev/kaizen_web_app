<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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

    	foreach($datas as $data)
    	{
    		User::create([
    			'id' => $data['id'],
    			'fullname' => $data['fullname'],
    			'username' => $data['username'],
                'slug' => Str::slug($data['username']),
    			'about' => $data['about_me'],
    			'email' => $data['email'],
    			'image' => $data['icon'],
                'email_verification_code' => null,
                'password' => $data['password'],
                'verified' => $data['verified'],
                'is_admin' => 0,
    			'created_at' => $data['created_at'],
                'updated_at' => $data['created_at']

    		]);
    	}
    
    }
}
