<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["first_name" => "Test", "last_name" => "User",
				"email" => "testuser@test.com", "password" => bcrypt("secret"),
				"mobile" => "9876543210"
			],
		];

		\DB::table("users")->insert($data);
    }
}
