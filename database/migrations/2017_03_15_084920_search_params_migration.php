<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SearchParamsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("campus", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

        Schema::create("housing_type", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

        Schema::create("bedroom", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

        Schema::create("bathroom", function ($table) {
			$table->increments("id");
			$table->string("name");
			$table->timestamps();
		});

        Schema::create("price_range", function ($table) {
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
        Schema::drop("campus");
        Schema::drop("housing_type");
        Schema::drop("bedroom");
        Schema::drop("bathroom");
        Schema::drop("price_range");
    }
}
