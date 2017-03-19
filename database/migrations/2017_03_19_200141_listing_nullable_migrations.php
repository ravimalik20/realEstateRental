<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListingNullableMigrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("listing", function ($table) {
			$table->string("website")->nullable()->change();
			$table->text("description")->nullable()->change();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("listing", function ($table) {
			$table->string("website")->change();
			$table->text("description")->change();
		});
    }
}
