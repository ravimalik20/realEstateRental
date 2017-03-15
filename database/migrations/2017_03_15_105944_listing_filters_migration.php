<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingFiltersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("amenities", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

		Schema::create("restrictions", function ($table) {
			$table->increments("id");
			$table->string("name");
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
        Schema::drop("amenities");
        Schema::drop("restrictions");
    }
}
