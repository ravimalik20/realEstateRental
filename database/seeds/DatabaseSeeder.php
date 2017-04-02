<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\BathroomSeeder::class);
        $this->call(\BedroomSeeder::class);
        $this->call(\CampusSeeder::class);
        $this->call(\HousingTypeSeeder::class);
        $this->call(\PriceRangeSeeder::class);
		$this->call(\AmenitiesSeeder::class);
		$this->call(\RestrictionsSeeder::class);
		$this->call(\CountrySeeder::class);
		$this->call(\InitialPaymentTypeSeeder::class);
		$this->call(\ProgramSeeder::class);
		$this->call(\UserSeeder::class);
    }
}
