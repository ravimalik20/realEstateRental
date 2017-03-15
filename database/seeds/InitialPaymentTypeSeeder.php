<?php

use Illuminate\Database\Seeder;

class InitialPaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "Last month's rent"],
			["name" => "First and last month's rent"],
			["name" => "Last month's rent + deposit"]
		];

		\DB::table("initial_payment_type")->insert($data);
    }
}
