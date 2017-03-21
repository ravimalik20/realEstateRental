<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFirstLastNameMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function ($table) {
			$table->dropColumn("name");

			$table->string("first_name");
			$table->string("last_name");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function ($table) {
			$table->dropColumn("first_name");
			$table->dropColumn("last_name");

			$table->string("name");
		});
    }
}
