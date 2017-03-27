<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampusCoordinatesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("campus", function ($table) {
			$table->decimal('lat', 10, 7);
			$table->decimal('lng', 10, 7);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("campus", function ($table) {
			$table->dropColumn('lat');
			$table->dropColumn('lng');
		});
    }
}
