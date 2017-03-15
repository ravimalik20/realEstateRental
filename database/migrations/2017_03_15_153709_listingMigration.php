<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create("country", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

		Schema::create("initial_payment_type", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

        Schema::create("listing", function ($table) {
			$table->increments("id");

			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("users");

			$table->integer("campus_id")->unsigned();
			$table->foreign("campus_id")->references("id")->on("campus");

			$table->string("address");
			$table->string("city");
			$table->string("province");
			$table->string("postal_code");

			$table->integer("country_id")->unsigned();
			$table->foreign("country_id")->references("id")->on("country");

			$table->decimal('lat', 10, 7);
			$table->decimal('lng', 10, 7);

			$table->float("distance", 8, 2);
			$table->date("date_available");
			$table->integer("num_bedrooms");
			$table->integer("num_bathrooms");
			$table->integer("max_tenants");
			$table->integer("num_parking");
			$table->string("license_number")->nullable();
			$table->float("rent", 8, 2);

			$table->integer("housing_type_id")->unsigned();
			$table->foreign("housing_type_id")->references("id")->on("housing_type");

			$table->boolean("lease_required")->default(false);
			$table->boolean("utilities_required")->default(false);

			$table->integer("initial_payment_type_id")->unsigned();
			$table->foreign("initial_payment_type_id")->references("id")->on("initial_payment_type");

			$table->string("website");
			$table->text("description");

			$table->timestamps();
		});

		Schema::create("listing_amenities", function ($table) {
			$table->increments("id");

			$table->integer("amenity_id")->unsigned();
			$table->foreign("amenity_id")->references("id")->on("amenities");

			$table->integer("restriction_id")->unsigned();
			$table->foreign("restriction_id")->references("id")->on("restrictions");

			$table->timestamps();
		});

		Schema::create("listing_photos", function ($table) {
			$table->increments("id");

			$table->integer("listing_id")->unsigned();
			$table->foreign("listing_id")->references("id")->on("listing");

			$table->string("path");			

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
		Schema::drop("country");

		Schema::drop("initial_payment_type");

        Schema::drop("listing");

		Schema::drop("listing_amenities");

		Schema::drop("listing_photos");
    }
}
