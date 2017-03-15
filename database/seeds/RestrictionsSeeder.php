<?php

use Illuminate\Database\Seeder;

class RestrictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "No Pets"],
			["name" => "No Smoking"],
			["name" => "No Parties"]
		];

		\DB::table("restrictions")->insert($data);
    }
}
