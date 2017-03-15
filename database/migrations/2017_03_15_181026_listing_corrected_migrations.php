<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingCorrectedMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop("listing_amenities");

		Schema::create("listing_amenities", function ($table) {
			$table->increments("id");

			$table->integer("listing_id")->unsigned();
			$table->foreign("listing_id")->references("id")->on("listing");

			$table->integer("amenity_id")->unsigned();
			$table->foreign("amenity_id")->references("id")->on("amenities");

			$table->timestamps();
		});

		Schema::create("listing_restrictions", function ($table) {
			$table->increments("id");

			$table->integer("listing_id")->unsigned();
			$table->foreign("listing_id")->references("id")->on("listing");

			$table->integer("restriction_id")->unsigned();
			$table->foreign("restriction_id")->references("id")->on("restrictions");

			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("listing_amenities");

		Schema::drop("listing_restrictions");

		Schema::create("listing_amenities", function ($table) {
			$table->increments("id");

			$table->integer("amenity_id")->unsigned();
			$table->foreign("amenity_id")->references("id")->on("amenities");

			$table->integer("restriction_id")->unsigned();
			$table->foreign("restriction_id")->references("id")->on("restrictions");

			$table->timestamps();
		});
    }
}
